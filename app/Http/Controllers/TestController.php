<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    // TAKE HTTP REQUEST FROM WEB ROUTES TO TestController test() function
    // and return message
    public function test()
    {
        return "This message is from Test Controller";
    }

    // CONTROLLER FUNCTION TO RETURN A VIEW
    public function view_test()
    {
        return view('test-view');
    }

    // CONTROLLER FUNCTION WITH PARAMETER(S)
    public function params_test($msg)
    {
        return $msg;
    }

    public function register()
    {
        return "Register Page";
    }

    public function login()
    {
        return "Login Page";
    }

    // FUNCTION THAT PASSES DATA TO A VIEW
    public function pass_data($data)
    {
        // THIS IS HOW TO PASS SINGLE DATA ITEM TO VIEW
        return view('pass_data',['data' => $data]);
    }

    // FUNCTION THAT PASSES AN ARRAY OF DATA TO A VIEW
    public function products()
    {
        // return "Test";
        // $products = ['name' => 'Redmi','price' => 17000];
        // $products = "These are the product";

        // return view('products',['products' => $products]);
        return "Not done yet";
    }

    public function create()
    {
        // SHOW THE FORM
        return view('test_create');
    }

    public function store(Request $request)
    {
        // SUBMIT THE FORM
        

        // THIS IS HOW TO VALIDATE THE FORM
        $this->validate($request,[
            'title' => 'required|min:5|max:30',
            'place' => 'required'
        ],
        [
            'title.required' => 'Please enter the Title.',
            'place.required' => 'Plase enter the Place.'
        ]);

        // THIS IS HOW TO REDIRECT BACK TO PREVIOUS PAGE
        // return redirect()->back();
        // OR IF REDIRECT BACK ONLY USE INSTEAD
        // return back();
        // IF REDIRECT TO SPECIFIC PAGE USE 
        // return redirect('/test-view');
        // OR INSTEAD USE ROUTE NAME
        // return redirect()->route('test-view');
        // OR IF REDIRECT TO A PAGE WITH DATA USE CONCATENATION TO PASS IT
        // $id = 1;
        // return redirect('/test-view/'.$id);
        // IF WANT TO PASS FLASH MESSAGE : -
        return back()->with('message','Your form is submitted.');



        // dd($request->all());
        // dd($request->place);
        // OR
        //  dd($request->get('title'));
        // OR
        // dd(request('title'));

    }
}




















































