<?php
namespace App\Http\Status;

class NotFound{
  
    public function __construct(){
        http_response_code(404);
    }

    public function index(){
        var_dump('Not Found');
    }
}