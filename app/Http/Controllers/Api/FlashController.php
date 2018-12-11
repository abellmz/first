<?php

namespace App\Http\Controllers\Api;

use App\Models\Flash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FlashController extends CommonController
{
    public function flashs(){
        $limit =\request()->query('limit',2);
//        dd('1');
        return $this->response->array(Flash::limit($limit)->get());
    }
}
