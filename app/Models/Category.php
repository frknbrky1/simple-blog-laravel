<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Category extends Model
{
    public function articleCount() {
        return $this->hasMany('App\Models\Article', 'category_id', 'id')->where('status',1)->count();

        //return $this->hasMany('App\Models\Article', 'category_id', 'id')->count();
        //Bağlanacağımız model , bağlanacağımz sütun, bağlancak id
    }
}
