<?php

namespace App\Exceptions;

use Exception;

class AuthException extends Exception
{
    public function render(){
        return redirect()->back()->with('danger',$this->getMessage());
    }
}
