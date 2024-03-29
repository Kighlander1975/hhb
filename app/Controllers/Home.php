<?php

namespace App\Controllers;

class Home extends BaseController
{
    private $user;

    public function __construct()
    {
        $this->user = auth()->user();   
    }
    
    public function index()
    {
        return view('Home/index',[
            'user' => $this->user,
        ]);
    }

    public function login()
    {
        return redirect()->to('/#loginModal');
    }
    public function register()
    {
        return redirect()->to('/#registerModal');
    }
}
