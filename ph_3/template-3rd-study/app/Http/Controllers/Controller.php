<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index() {


        
       return view ('index',);


    }

    public function post(Request $request){

       

        return view('index',['msg'=>$request->msg]);

        


    }


   
    
    public function message() {


        
       return view ('components/message',);


    }
    
}

