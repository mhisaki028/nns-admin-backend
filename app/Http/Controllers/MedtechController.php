<?php

namespace App\Http\Controllers;

use DB;
use Auth;   
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Medtech;
use App\Lab;
use App\Booking;

class MedtechController extends Controller
{
    ///////////////////ADMIN
    public function index(){
        $medtechs = DB::table('medtechs')
            ->join('laboratories', 'medtechs.lab_designation', '=', 'laboratories.lab_id')
            ->get(); 
        

        $labs = Lab::all();
        $bookings = Booking::all();
        $medtechs = Medtech::all();
        $c_medtech = count($medtechs);

        return view ('medtech',['medtechs'=>$medtechs, 'labs'=>$labs, 'bookings'=>$bookings, 'c_medtech'=>$c_medtech]);
    }

     public function addMedtech(Request $request){
        $medtechs = new Medtech;
        $medtechs->medtech_id = Input::get('medtech_id');
        $medtechs->medtech_name = Input::get('medtech_name');
        $medtechs->medtech_no = Input::get('medtech_no');
        $medtechs->lab_designation= Input::get('lab_designation');
        $medtechs->time_avail = Input::get('time_avail');
        $medtechs->assignment = 0;
        $medtechs->save();

        return redirect ('/medtech');
    }

       public function editMedtech(Request $request){

        $lc_medtechs = Medtech::findOrFail($request->medtech_id);
        $lc_medtechs->update($request->all());

        return back();

    }


    public function deleteMedtech($medtech_id){
        Medtech::where('medtech_id', $medtech_id)
            ->delete();

            return redirect('/medtech');
    }

/////////////////////////LC

    public function lcmedtech(){

          $collection = DB::table('laboratories')->where('user_id', Auth::id())->first();
        $labid = $collection->lab_id;


    	$lc_medtechs = Medtech::where('lab_designation', $labid)
    		->join('laboratories', 'medtechs.lab_designation', '=', 'laboratories.lab_id')
    		->get();

    	$labs = Lab::all();

        $c_lcmed = count($lc_medtechs);
        $sortedLCmed = array_reverse(array_sort($lc_medtechs, SORT_DESC, 'created_at'));

    	return view ('labmedtech', ['lc_medtechs'=>$lc_medtechs, 'labs'=>$labs, 'c_lcmed'=>$c_lcmed, 'sortedLCmed'=>$sortedLCmed]);
    }



    //Add
    public function addLCMedtech(Request $request){
        $collection = DB::table('laboratories')->where('user_id', Auth::id())->first();
        $labid = $collection->lab_id;

    	$lc_medtechs = new Medtech;
        $lc_medtechs->medtech_id = Input::get('medtech_id');
        $lc_medtechs->medtech_name = Input::get('medtech_name');
        $lc_medtechs->medtech_no = Input::get('medtech_no');
        $lc_medtechs->lab_designation = $labid;
        $lc_medtechs->assignment = 0;
        $lc_medtechs->time_avail = Input::get('time_avail');
        $lc_medtechs->status = Input::get('status');
        $lc_medtechs->save();

        return redirect ('/labmedtech');
    }

    //Edit
    public function editLCMedtech(Request $request){

    	$lc_medtechs = Medtech::findOrFail($request->medtech_id);
        $lc_medtechs->update($request->all());

        
        return back();

    }

    //Delete
    public function deleteLCMedtech(Request $request){
    	$lc_medtech = Medtech::findOrFail($request->medtech_id)->delete();

        return back();
    }
}
