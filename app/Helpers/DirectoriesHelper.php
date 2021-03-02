<?php

namespace App\Helpers;
use App\Models\StoresCategory;

class DirectoriesHelper {
    public function manipulate($directory, $request) {
        $directory->name    = $request->directoryname;
        $directory->slug    = str_slug($request->url);

        if($request->hasFile('thumbnail')){
            $directory->image = $request->thumbnail->store('storesCategories', ['disk' => 'public']);     
        }

        $directory->save();
        return $directory;
    }

    public static function update($request,$id) {
        $helper     = new self;
        $directory  = StoresCategory::find($id);
        return $helper->manipulate($directory, $request);
    }

    public static function save($request){
        $helper     = new self;
        $directory  = new StoresCategory();
        return $helper->manipulate($directory, $request);
    }

}