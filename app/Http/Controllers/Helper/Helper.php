<?php

namespace App\Http\Controllers\Helper;

class Helper{

    public static function response($msg,$data,$status,$code){
        return response()->json([
            'status' => $status,
            'message' => $msg,
            'data' => $data,
        ],$code);
    }

    public static function errors($msg,$errors,$status,$code){
        return response()->json([
            'status' => $status,
            'message' => $msg,
            'error' => $errors,
        ],$code);
    }
}