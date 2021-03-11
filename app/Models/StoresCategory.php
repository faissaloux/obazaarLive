<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StoresCategory extends Model
{
    protected $table = 'stores_categories';

    public function presentThumbnail($setting = false){
        if(!empty($this->image)){
          return '<img src="/uploads/'. $this->image .'"/>';
        }
        return '';
    }

    public function presentThumbnailback($setting = false){
        if(!empty($this->image)){
            return  '/uploads/'.$this->image;
        }
        return '';
    }

    public function stores(){
        return $this->hasMany('App\Models\Stores', 'category_id');
    }
}
