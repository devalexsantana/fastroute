<?php

namespace App\Http\Controller;
class HomeController{
    public function index(){
        echo "Minha home";
    }

    public function show(int $id){
        var_dump($id);
    }

    public function admin(){
        echo "paginha admin";
    }
}