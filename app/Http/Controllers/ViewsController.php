<?php

namespace App\Http\Controllers;

use App\User;
use App\Lab;
use App\Booking;
use App\Medtech;
use App\Service;
use Auth;
use DB;
use Illuminate\Http\Request;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Factory;

class ViewsController extends Controller
{
    public function home(){
    	$labs = User::where('admin',0)->get();
        $medtechs = Medtech::all();
        $bookings = Booking::all();
        $services = Service::all();


    	$c_lab = count($labs);
        $c_medtech = count($medtechs);
        $c_booking = count($bookings);
        $c_service = count($services);


        $total = Booking::all()
        ->sum('totalfee');

        $wallet = $c_booking * 50; 

        $display = number_format($total, 2, '.', ',');

        $display_wallet = number_format($wallet, 2, '.', ',');


       

    	$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/firebaseService.json');

        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            // The following line is optional if the project id in your credentials file
            // is identical to the subdomain of your Firebase project. If you need it,
            // make sure to replace the URL with the URL of your project.
            ->withDatabaseUri('https://androidpatientapp.firebaseio.com/')
            ->create();

        $database = $firebase->getDatabase();

        $patient_ref = $database->getReference("Patients");
        $patients = $patient_ref->getValue();
        $c_patient = count($patients);
    
    	 

    	 return view ('home', ['c_lab'=>$c_lab, 'c_patient'=>$c_patient, 'c_booking'=>$c_booking, 'c_medtech'=>$c_medtech, 'c_service'=>$c_service,'display'=>$display, 'display_wallet'=>$display_wallet]);

    }

    public function logoutR(Request $request){
        Auth::logout();
        return redirect()->route('register');
    }

    public function lclabhome(){
     
        $lc = Lab::find(1);
        $bookings = Booking::all();
        $c_booking = count($bookings);

        $pending = Booking::where('status', 'PENDING')->get();
        $c_pending = count($pending);

        $completed = Booking::where('status', 'COMPLETED')->get();
        $c_complete = count($completed);

        $total = Booking::where('lab',1)
        ->sum('totalfee');

        $display = number_format($total, 2, '.', ',');



        return view('lclabhome', ['lc'=>$lc, 'c_booking'=>$c_booking, 'display'=>$display, 'c_pending'=>$c_pending, 'c_complete'=>$c_complete]);
    }

    public function mmglabhome(){
     
        $mmg = Lab::find(2);

        return view('mmglabhome', ['mmg'=>$mmg]);
    }

    public function ludacslabhome(){
     
        $ludacs = Lab::find(3);

        return view('ludacslabhome', ['ludacs'=>$ludacs]);
    }
}
