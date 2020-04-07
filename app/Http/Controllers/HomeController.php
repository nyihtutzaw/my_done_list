<?php

namespace App\Http\Controllers;
use Validator;

class HomeController extends Controller
{


    public function __construct()
    {
        parent::__construct();

    }


    public function index()
    {
        return view("home.index");
    }

   

}