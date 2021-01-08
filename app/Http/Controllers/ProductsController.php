<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\{Product,ProductCategories};
use \App\Helpers\ProductHelper;
use \App\Helpers\HistoryHelper;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller {


    public function index(Request $request) {
        $categories     = ProductCategories::Merchant()->get();
        $store          = \Auth::user()->store_id;
        $data           = Product::where('store_id',$store)->latest();
        $allProduct     = Product::where('store_id',41)->get(['id','name']);
        
        $count          = Product::where('store_id',$store)->count();
        $active         = Product::where('store_id',$store)->where('active', '1')->count();
        $not_active     = Product::where('store_id',$store)->where('active', '0')->orwhereNull('active')->where('store_id',$store)->count();

        if(isset($request->category) and is_numeric($request->category)){
            $data       = $data->where('categoryID', $request->category);
            $count      = Product::where('store_id',$store)->where('categoryID', $request->category)->orwhereNull('active')->count();
            $active     = Product::where('store_id',$store)->where('active', '1')->where('categoryID', $request->category)->count();
            $not_active = Product::where('store_id',$store)->where('active', '0')->where('categoryID', $request->category)->orwhereNull('active')->count();
        }

        $products = $data->paginate(40);
        $products->appends(request()->input())->links();

        return view('admin.products.index',compact('products','categories','count','active','not_active','allProduct'));
    }



    public function search(Request $request){
        $store          = \Auth::user()->store_id;
        $categories     = ProductCategories::where('store_id',$store)->get();

        $count          = Product::where('store_id',$store)->count();
        $active         = Product::where('store_id',$store)->where('active', '1')->count();
        $not_active     = Product::where('store_id',$store)->where('active', '0')->orwhereNull('active')->where('store_id',$store)->count();
        $allProduct     = Product::where('store_id',41)->get(['id','name']);

		$q          = $request->q;
		$lang       = \App::getLocale();
		$products   = Product::where('store_id',$store)->where('name','LIKE','%' . $q . '%')->paginate(10);
		$count      = $products ->count();
        return view('admin.products.index',compact('products','categories','count','active','not_active','allProduct'))->withQuery ( $q );
    }


    public function activate(Request $request,$id){
        $content    = Product::find($id);
        $content->active  = '1';
        $content -> save();
        return redirect()->back()->with('success',trans('product.activated'));
        return redirect()->route('admin.products.home')->with('success',trans('product.activated'));
    }

    public function deactivate($id){
        $content    = Product::find($id);
        $content->active = '0';
        $content -> save();
        return redirect()->back()->with('success',trans('product.activated'));
        return redirect()->route('admin.products.home')->with('success',trans('product.deactivated'));
    }


    public function create(){
        $categories = ProductCategories::Merchant()->get();
        return view('admin.products.create',compact('categories'));
    }

    public function edit($id){
        $content    = Product::where('id', $id)->where('store_id', Auth::user()->store_id)->first();
        if(!$content){
            return redirect()->back();
        }
        $categories = ProductCategories::Merchant()->get();
        return view('admin.products.edit',compact('content','categories'));
    }


    public function store(Request $request) {

         $rules = [
        //  'price'            => 'required|numeric',
       //   'discount'         => 'numeric',
          'stock'            => 'numeric',
          'ProductThumbnail' => 'required',
        ];


        $messages = [
            'title.required'            => trans("title.required"),
            'description.required'      => trans("description.required"),
            'price.required'            => trans("price.required"),
            'ProductThumbnail.required' => trans("ProductThumbnail.required"),
        ];

        $request->validate($rules,$messages);

        $content = new Product ;
        ProductHelper::save($content,$request);
        return redirect()->route('admin.products.home')->with('success',trans('product.created'));   
    }

    public function update(Request $request, $id) {
        $content = Product::find($id);
        ProductHelper::save($content,$request);
        return redirect(HistoryHelper::get(2))->with('success',trans('product.updated'));   ;
    }

    public function duplicate($id) {
        $content = Product::find($id);
        $new = $content->replicate();
        $new->save();
        return redirect()->route('admin.products.home')->with('success',trans('product.duplicated'));
    }

    public function blukdelete(){
        Product::Merchant()->Lang()->truncate();
        ProductHelper::empty();
        return redirect()->route('admin.products.home')->with('success',trans('product.blukdelete'));
    }

    public function delete($id){
        $product = Product::find($id);
        if($product ){
            ProductHelper::clean($product);
            $product->delete();
        }
       // $link = HistoryHelper::get(2);
        return redirect()->back()->with('success',trans('product.deleted'));
        //return redirect()->route('admin.products.home')->with('success',trans('product.deleted'));
    }

    public  function bulkactivated(Request $request){
        $ids = explode(',',$request->bulkactivatedProductIDS) ?? [];
        //dd($request->bulkactivatedProductIDS);        


         $products =  Product::whereIn('id', $ids)->get();
          if($products->count() > 0  ) {
                    foreach($products as $product){
                        $product->active = '1';
                        $product->save();
                    }
          }
                
                return redirect()->back()->with('success',trans('product.activated'));

    }

    public  function bulkdeactivated(Request $request){
        $ids = explode(',',$request->bulkdeactivatedProductIDS) ?? [];
        //dd($request->bulkdeactivatedProductIDS);


         $products =  Product::whereIn('id', $ids)->get();
          if($products->count() > 0  ) {
                    foreach($products as $product){
                        $product->active = '0';
                        $product->save();
                    }
          }

                        return redirect()->back()->with('success',trans('product.deactivated'));

    }

    public function importproduct(Request $request) {
        $content = Product::find($request->product_id);
        $new = $content->replicate();
        $new->store_id = \Auth::user()->store_id;
        $new->save();
        return redirect()->route('admin.products.home')->with('success',trans('product.imported'));
    }

}
