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

        $pending = Booking::where('status', 'PENDING')->get();
        $completed = Booking::where('status', 'COMPLETED')->get();
        $processing = Booking::where('status', 'PROCESSING')->get();
        $delivered = Booking::where('status', 'DELIVERED')->get();
        $c_pending = count($pending);
        $c_completed = count($completed);

        $pendingBooks = array_reverse(array_sort($pending, SORT_DESC, 'created_at'));
        $completedBooks = array_reverse(array_sort($completed, SORT_DESC, 'created_at'));
        $deliveredBooks = array_reverse(array_sort($delivered, SORT_DESC, 'created_at'));
        $processingBooks = array_reverse(array_sort($processing, SORT_DESC, 'created_at'));


        $wallet = $c_booking * 50; 
        $display_wallet = number_format($wallet, 2, '.', ',');

        $paid = Booking::where('payment', 'PAID')->get();
        $unpaid = Booking::where('payment', 'UNPAID')->get();
        $c_paid = count($paid);
        $current = $c_paid * 50;
        $display_current = number_format($current, 2, '.', ',');


       

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

        $reviews_ref = $database->getReference("Reviews");
        $reviews = $reviews_ref->getValue();
        $c_review = count($reviews);

        $sortedReviews = array_reverse(array_sort($reviews, "txtDay"));

        $like_ref = $database->getReference("Reviews")->orderByChild("rating")->equalTo("Like")->getSnapshot();
        $likereviews = $like_ref->getValue();
        $dislike_ref = $database->getReference("Reviews")->orderByChild("rating")->equalTo("Dislike")->getSnapshot();
        $dislikereviews = $dislike_ref->getValue();

        foreach ($reviews as $review){
            $all_review[] = $review;

        }

        foreach($likereviews as $like){
            $all_like[] = $like;
        }

        foreach($dislikereviews as $dislike){
            $all_dislike[] = $dislike;
        }

         $total = Booking::all()->sum('totalfee');
         $total_all = $total - $wallet;
         $display_total = number_format($total_all, 2, '.', ',');
            
            ////
         $lc_bookings = Booking::where('lab', 1)->get();
         $sortedLC = array_reverse(array_sort($lc_bookings, SORT_DESC, 'created_at'));
         $lc_tot = Booking::where('lab', 1)->sum('totalfee');
         $md_lc = Booking::where('lab',1)->count();
         $lcwallet = $md_lc * 50;
         $lc_total = $lc_tot - $lcwallet;
         $lcsales = number_format($lc_total, 2, '.', ',');

         ////////////
         $mmg_bookings = Booking::where('lab',2)->get();
         $mmg_tot = Booking::where('lab',2)->sum('totalfee');
         $md_mmg = Booking::where('lab',2)->count();
         $mmgwallet = $md_mmg * 50;
         $mmg_total = $mmg_tot - $mmgwallet;

         ////////////
         $ludacs_bookings = Booking::where('lab',3)->get();
         $ludacs_tot = Booking::where('lab',3)->sum('totalfee');
         $md_ludacs = Booking::where('lab',3)->count();
         $ludacswallet = $md_ludacs * 50;
         $ludacs_total = $ludacs_tot - $ludacswallet;

    

    	 return view ('home',['c_lab'=>$c_lab, 'c_patient'=>$c_patient, 'c_booking'=>$c_booking, 'c_medtech'=>$c_medtech, 'c_service'=>$c_service, 'c_review'=>$c_review, 'display_wallet'=>$display_wallet, 'total_all'=>$total_all, 'lc_bookings'=>$lc_bookings, 'mmg_bookings'=>$mmg_bookings, 'ludacs_bookings'=>$ludacs_bookings, 'lc_total'=>$lc_total, 'mmg_total'=>$mmg_total, 'ludacs_total'=>$ludacs_total, 'all_like'=>$all_like, 'all_dislike'=>$all_dislike, 'all_review'=>$all_review, 'sortedReviews'=>$sortedReviews, 'c_pending'=>$c_pending, 'c_completed'=>$c_completed, 'pendingBooks'=>$pendingBooks, 'completedBooks'=>$completedBooks, 'display_total'=>$display_total, 'display_current'=>$display_current, 'paid'=>$paid, 'unpaid'=>$unpaid, 'sortedLC'=>$sortedLC]);

    }

    public function logoutR(Request $request){
        Auth::logout();
        return redirect()->route('register');
    }

    public function lclabhome(){
     
        $lc = Lab::find(1);
         $lc_bookings = Booking::where('lab', 1)->get();

        $pending = Booking::where('status', 'PENDING')->get();
        $processing = Booking::where('status', 'PROCESSING')->get();
        $delivered = Booking::where('status', 'DELIVERED')->get();
        $completed = Booking::where('status', 'COMPLETED')->get();

        $c_lcbook = count($lc_bookings);
        $c_pending = count($pending);
        $c_processing = count($processing);
        $c_delivered = count($delivered);
        $c_completed = count($completed);


        $pending = Booking::where('status', 'PENDING')->get();
        $completed = Booking::where('status', 'COMPLETED')->get();
        $processing = Booking::where('status', 'PROCESSING')->get();
        $delivered = Booking::where('status', 'DELIVERED')->get();


        $pendingBooks = array_reverse(array_sort($pending, SORT_DESC, 'created_at'));
        $completedBooks = array_reverse(array_sort($completed, SORT_DESC, 'created_at'));
        $deliveredBooks = array_reverse(array_sort($delivered, SORT_DESC, 'created_at'));
        $processingBooks = array_reverse(array_sort($processing, SORT_DESC, 'created_at'));

         $lc_tot = Booking::where('lab', 1)->sum('totalfee');
         $md_lc = Booking::where('lab',1)->count();
         $lcwallet = $md_lc * 50;
         $lc_total = $lc_tot - $lcwallet;
         $lcsales = number_format($lc_total, 2, '.', ',');

        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/firebaseService.json');

        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            // The following line is optional if the project id in your credentials file
            // is identical to the subdomain of your Firebase project. If you need it,
            // make sure to replace the URL with the URL of your project.
            ->withDatabaseUri('https://androidpatientapp.firebaseio.com/')
            ->create();

        $database = $firebase->getDatabase();
     

        $lc_ref = $database->getReference("Reviews")->orderByChild("lab")->equalTo("LC Diagnostic Center")->getSnapshot();
        $lcreviews = $lc_ref->getValue();

        $sortedlcrev = array_reverse(array_sort($lcreviews, 'txtDay'));






        return view('lclabhome', ['lc'=>$lc, 'lc_bookings'=>$lc_bookings, 'c_pending'=>$c_pending, 'c_processing'=>$c_processing, 'c_delivered'=>$c_delivered, 'c_completed'=>$c_completed, 'sortedlcrev'=>$sortedlcrev, 'pendingBooks'=>$pendingBooks, 'processingBooks'=>$processingBooks, 'deliveredBooks'=>$deliveredBooks, 'completedBooks'=>$completedBooks, 'lcsales'=>$lcsales]);
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
