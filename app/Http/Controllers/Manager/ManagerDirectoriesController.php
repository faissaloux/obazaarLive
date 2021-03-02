<?php

namespace App\Http\Controllers\Manager;

use App\Models\Stores;
use Illuminate\Http\Request;
use App\Models\StoresCategory;
use App\Helpers\DirectoriesHelper;
use App\Http\Controllers\Controller;

class ManagerDirectoriesController extends Controller
{
    public function index()
    {
        $stores_categories = StoresCategory::orderby('id','desc')->paginate(10);
        return view('manager.directory.index',compact('stores_categories')); 
    }

    public function store(Request $request)
    {
        $rules = [
          'directoryname'   => 'required|string|min:4',
          'url'             => 'required',
        ];

        $messages = [
            'directoryname.required'=> trans("directoryname.required"),
            'url.required'          => trans("url.required"),
        ];

        $request->validate($rules,$messages);

        DirectoriesHelper::save($request);

        return redirect()->route('manager.directory.home')->with('success', trans('directory.created'));
    }

    public function edit($id)
    {
        $content = StoresCategory::find($id);
        return view('manager.directory.edit',compact('content'));
    }

    public function update(Request $request, $id)
    {
        DirectoriesHelper::update($request, $id);
        return redirect()->route('manager.directory.home')->with('success',trans('directory.updated'));
    }

    public function delete($id)
    {
        $stores = Stores::where('category_id', $id)->get();
        foreach($stores as $store){
            $store->category_id = NULL;
            $store->save();
        }
        StoresCategory::find($id)->delete();
        return redirect()->route('manager.directory.home')->with('success',trans('directory.deleted'));
    }
}
