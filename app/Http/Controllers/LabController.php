<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\User;

class LabController extends Controller
{
    public function index(){
    	$labs = User::where('admin', 0)->get();

    	$c_lab = count($labs);
    

        return view('lab', ['labs'=>$labs, 'c_lab'=>$c_lab]); 
    }


    public function deleteLab($id){


	    	User::where('id', $id)
	        ->delete();

	        return redirect('/lab');
	}


}