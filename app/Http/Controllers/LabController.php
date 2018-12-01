<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\User;

class LabController extends Controller
{
    public function index(){
    	$labs = User::where('admin', 0)->get();
    

        return view('lab', ['labs'=>$labs]); 
    }


    public function deleteLab($id){


	    	User::where('id', $id)
	        ->delete();

	        return redirect('/lab');
	}


}