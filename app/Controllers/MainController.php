<?php

namespace App\Controllers;



class MainController extends BaseController
{
    // Models



    //Property

    public function __construct()
    {
        //Initialize Models

    }

    public function index()
    {
        return view('pages/home');
    }
}
