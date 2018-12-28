<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\User;

class LabController extends Controller
{
    public function index(){
    	$labs = User::where('isAdmin', 0)->get();

    	$c_lab = count($labs);
    

        return view('lab', ['labs'=>$labs, 'c_lab'=>$c_lab]); 
    }


    public function deleteLab(Request $request){

        $id = $request->get('lab_id');
        
	    	User::where('id', $id)
	        ->delete();

	        return redirect('/lab');
	}


}