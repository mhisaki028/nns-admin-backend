<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Factory;
use Carbon\Carbon;


class PatientController extends Controller
{

    public function index(){

        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/firebaseService.json');

        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            // The following line is optional if the project id in your credentials file
            // is identical to the subdomain of your Firebase project. If you need it,
            // make sure to replace the URL with the URL of your project.
            ->withDatabaseUri('https://androidpatientapp.firebaseio.com/')
            ->create();

        $database = $firebase->getDatabase();

        $ref = $database->getReference("Patients");

        $patients = $ref->getValue();

        $c_patient = count($patients);

        
       
        foreach ($patients as $patient){
            $all_patient[] = $patient;

        }

    

        return view ('patient', compact('all_patient'), ['c_patient'=>$c_patient]);
    }


    public function addPatient(Request $request){
    	$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/firebaseService.json');

        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            // The following line is optional if the project id in your credentials file
            // is identical to the subdomain of your Firebase project. If you need it,
            // make sure to replace the URL with the URL of your project.
            ->withDatabaseUri('https://androidpatientapp.firebaseio.com/')
            ->create();

        $database = $firebase->getDatabase();

        $ref = $database->getReference("Patients");

        $patientname = $request->name;
        $patientno = $request->contact_no;
        $patientemail = $request->email;
        $patientpass = $request->password;
        $timestamp = Carbon::now()->toDateTimeString();
        
    
        $key = $ref->push()->getKey();

    	$ref->getChild($key)->set([
    		'name'=>$patientname,
    		'phone'=>$patientno,
    		'email'=>$patientemail,
    		'password'=>$patientpass,
    		'timestamp'=>$timestamp
    	]);

    	$patients = $ref->getValue();

       


        foreach ($patients as $patient){
            $all_patient[] = $patient;

        }

    	return back();

    }


}
