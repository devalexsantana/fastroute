<?php
namespace App\Http\Status;

class NotAllowed{
    public function __construct(){
        http_response_code(405);
    }

    public function index(){
        var_dump('Method Not Allowed');
    }
}