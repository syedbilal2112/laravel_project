<?php

namespace App\Http\Controllers;

use App\first_table;

use Illuminate\Http\Request;

class FirstTableController extends Controller
{
    //
    public function firstView(){
    	$arr = [1,3,5,4,55,33,3,3];
    	return view('home.file2',compact('arr'));
    }


    public function insertContents(){
    	 first_table::create([
            'name' => 'abc',
            'email' => 'abc@gmail.com',
            'password' => 'asdf',
            'role' => 'user'
        ]);
    	 return view('home.file1');
    }


}
