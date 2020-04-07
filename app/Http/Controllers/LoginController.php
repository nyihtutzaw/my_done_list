<?php

namespace App\Http\Controllers;
use Validator;

class LoginController extends Controller
{
    private $user;

    public function __construct()
    {
        parent::__construct();
        $this->user=new \App\Repo\User;
    }


    public function index()
    {
        return view("login.index");
    }

    public function logout()
    {
        $this->user->logout();
        return redirect("/");
    }

    public function login()
    {
        $validator = Validator::make(request()->all(),[
            'email' => 'required',
            "password" => "required",
        ]);

        if ($validator->fails()) 
        {
            return response()->json(
                $this->custom_response->create(false,$validator->messages())
            );
        }
        else 
        {

            if ($user=$this->user->login([
                "email"=>request("email"),
                "password"=>request("password")
            ]))
            {
                return response()->json(
                    $this->custom_response->create(true,"Login Success",array(
                        "user_id"=>$user->id,
                    )
                ));
            }
            else 
            {
                return response()->json(
                    $this->custom_response->create(false,"Login failed")
                );
            }
            
        }
    }

}