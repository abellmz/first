<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends CommonController
{
    public function categories(){
//        延迟3秒
//        sleep(3);
        $limit=\request()->query('limit',5);

//        return $this->response->array(Category::all());
        return $this->response->array(Category::limit($limit)->get());
    }
}
