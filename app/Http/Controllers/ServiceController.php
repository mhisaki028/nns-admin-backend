<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Service;

class ServiceController extends Controller
{
    public function index(){
    	$services = Service::all();

    	return view ('service',['services'=>$services]);

    }

    public function lcService(){
        $lc_services = Service::all();

        return view ('lclabservices',['lc_services'=>$lc_services]);
    }

    public function addLCService(Request $request){
    	$services = new Service;
    	$services->service_id = Input::get('service_id');
    	$services->service_name = Input::get('service_name');
    	$services->service_desc = Input::get('service_desc');
    	$services->service_price = Input::get('service_price');
    	$services->save();

    	return redirect ('/lclabservices');

    }

     public function editLCService(Request $request){

        $services = Service::findOrFail($request->service_id);
        $services->update($request->all());

        return back();

    }

    public function deleteLCService($service_id){
    	Service::where('service_id', $service_id)
            ->delete();

            return redirect('/lclabservices');
    }





}
