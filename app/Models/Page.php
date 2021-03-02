<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Jenssegers\Date\Date;


class Page extends Base {

   use SoftDeletes;

   protected $table = 'pages';
    
   protected $guarded = ['id', 'created_at', 'updated_at'];
   protected $dates = ['created_at', 'updated_at', 'deleted_at'];




}
