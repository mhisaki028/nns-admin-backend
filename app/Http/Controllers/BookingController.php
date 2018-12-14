<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Booking;
use App\Lab;
use App\Service;
use App\Medtech;
use App\FCMUser;
use Illuminate\Support\Facades\Input;

class BookingController extends Controller
{
//ADMIN
    public function index(){
        $bookings = Booking::all();
        $labs = Lab::all();
        $services = Service::all();
        $c_booking = count($bookings);

        $pending = Booking::where('status', 'PENDING')->get();
        $processing = Booking::where('status', 'PROCESSING')->get();
        $delivered = Booking::where('status', 'DELIVERED')->get();
        $completed = Booking::where('status', 'COMPLETED')->get();

        $c_pending = count($pending);
        $c_processing = count($processing);
        $c_delivered = count($delivered);
        $c_completed = count($completed);


        $pendingBooks = array_reverse(array_sort($pending, SORT_DESC, 'created_at'));
        $completedBooks = array_reverse(array_sort($completed, SORT_DESC, 'created_at'));




        $sortedBookings = array_reverse(array_sort($bookings, SORT_DESC, 'created_at'));       



        return view('booking', ['bookings'=>$bookings,'labs'=>$labs, 'services'=>$services, 'c_booking'=>$c_booking, 'sortedBookings'=>$sortedBookings, 'c_pending'=>$c_pending, 'c_processing'=>$c_processing, 'c_delivered'=>$c_delivered, 'c_completed'=>$c_completed]);
    }

    

    //LC Booking
    public function lcbooking(){
        $lc_bookings = Booking::where('lab',1)->get();
        $labs = Lab::all();
        $services = Service::all();
        $lc_medtechs = Medtech::where('lab_designation',1)->get();

        $pending = Booking::where('status', 'PENDING')->get();
        $processing = Booking::where('status', 'PROCESSING')->get();
        $delivered = Booking::where('status', 'DELIVERED')->get();
        $completed = Booking::where('status', 'COMPLETED')->get();

        $c_lcbook = count($lc_bookings);
        $c_pending = count($pending);
        $c_processing = count($processing);
        $c_delivered = count($delivered);
        $c_completed = count($completed);

        $sortedLCbook = array_reverse(array_sort($lc_bookings, SORT_DESC, 'created_at'));
   

     
        $eight = '8:00 - 9:00';
        $nine = '9:00 - 10:00';
        $ten = '10:00 - 11:00';
        $eleven = '11:00 - 12:00';
        $one = '1:00 - 2:00';
        $two = '2:00 - 3:00';
        $three = '3:00 - 4:00';

        $medtechs_eight = Medtech::where('time_avail',$eight)->where('lab_designation',1)
        ->get();

         $medtechs_nine = Medtech::where('time_avail',$nine)->where('lab_designation',1)
        ->get();

         $medtechs_ten = Medtech::where('time_avail',$ten)->where('lab_designation',1)
        ->get();

         $medtechs_eleven = Medtech::where('time_avail',$eleven)->where('lab_designation',1)
        ->get();

         $medtechs_one = Medtech::where('time_avail',$one)->where('lab_designation',1)
        ->get();

         $medtechs_two = Medtech::where('time_avail',$two)->where('lab_designation',1)
        ->get();

         $medtechs_three = Medtech::where('time_avail',$three)->where('lab_designation',1)
        ->get();


return view('lclabbooking', ['lc_bookings'=>$lc_bookings,'labs'=>$labs, 'services'=>$services,
'medtechs_eight'=>$medtechs_eight, 'medtechs_nine'=>$medtechs_nine, 'medtechs_ten'=>$medtechs_ten, 
'medtechs_eleven'=>$medtechs_eleven, 'medtechs_one'=>$medtechs_one, 'medtechs_two'=>$medtechs_two, 
'medtechs_three'=>$medtechs_three, 'lc_medtechs'=>$lc_medtechs, 'c_pending'=>$c_pending, 'c_processing'=>$c_processing, 'c_delivered'=>$c_delivered, 'c_completed'=>$c_completed, 'c_lcbook'=>$c_lcbook, 'sortedLCbook'=>$sortedLCbook]);

       
    }

    public function addLCBooking(Request $request){
        $lc_bookings = new Booking;
        $lc_bookings->id = Input::get('booking_id');

        //$latestReq = Booking::orderBy('created_at','DESC')->first();
        //$lc_bookings->request_no = "0" .str_pad($latestReq->id+1, 5, "0", STR_PAD_LEFT);

        $random = (mt_rand(1,9));
        // date('z') gives the day of year i.e today is day 106 of the year 2017
        $date = date('zyis'); 
        $date .= $random;
        $request_no = $date;

        $lc_bookings->request_no = $request_no;
        $lc_bookings->patient_name = Input::get('name');
        $lc_bookings->patient_address = Input::get('address');
        $lc_bookings->patient_phone = Input::get('phone');
        $lc_bookings->lab = 1;
        $lc_bookings->service = Input::get('labtest');
        $lc_bookings->date = Input::get('date');
        $lc_bookings->time = Input::get('time');
        $lc_bookings->totalfee = Input::get('totalfee');


        $lc_bookings->status = 'PENDING';
        $lc_bookings->medtech = null;
        $lc_bookings->payment = null;
        $lc_bookings->uploaded = 0;

        $lc_bookings->created_at = Carbon::now();
        $lc_bookings->updated_at = Carbon::now();
        $lc_bookings->save();
       

      
        return redirect ('/lclabbooking');

    }

     

      public function confirm(Request $request){
        
       $id = $request->get('id');

        $lc_bookings = Booking::where('id', $id)
        ->update(['status' => 'CONFIRMED' ]);
        

        return back();
    }

        public function assignMedtech(Request $request){

            $id = $request->get('id');

            $input_medtech = $request->input('chosen_medtech');

            DB::table('booking')
                ->where('id',$id)
                ->update(['medtech'=>$input_medtech, 'status' => 'PROCESSING']);
         
            $latestAss = Medtech::orderBy('created_at','DESC')->first();
            $newAss = ($latestAss->assignment + 1);

            $medtech = Medtech::where('medtech_name', $input_medtech)
            ->update(['assignment' => $newAss]);

            return redirect ('lclabbooking');
        }

        public function deliver(Request $request){

            $id = $request->get('id');

            $newPayStat = $request->input('payment');

            DB::table('booking')
            ->where('id', $id)
            ->update(['payment' => $newPayStat, 'status' => 'DELIVERED']) ;

            return back();

        }

        public function deliverunpaid(Request $request){
            $id = $request->get('id');

            $lc_bookings = Booking::where('id', $id)
            ->update(['status'=> 'DELIVERED']);
            return back();
        }

        public function showUpload($id){

            $lc_bookings = Booking::find($id);

            return view ('upload', ['lc_bookings'=>$lc_bookings]);

        }

        public function complete($id){
             $lc_bookings = Booking::where('id', $id)
                 ->update(['uploaded' => 1, 'status'=>'COMPLETED']);

        
 
 function send_notification ($tokens, $message){
     
 $url = 'https://fcm.googleapis.com/fcm/send';
            $fields = array(
                'registration_ids' => $tokens,
                'data' => $message 
            );

            $headers = array(
                'Authorization:key = AIzaSyAuG1gPQFwY8VBELfD8m22DIFj3embg6fI',
                'Content-Type: application/json'
                );

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

            $result = curl_exec($ch);
            if($result === FALSE){
                die('Curl failed: ' . curl_error($ch));
            }

            curl_close($ch);
            return $result;
            }
            
            $conn = mysqli_connect("localhost", "root", "", "mdadmin");
            $sql = "Select Token from fcm_users";
            $result = mysqli_query($conn,$sql);
            $tokens = array();
            
            if(mysqli_num_rows($result) > 0 ){
                while($row = mysqli_fetch_assoc($result)){
                    $tokens[] = $row["Token"];
                }
            }
            
            mysqli_close($conn);
            
            $message = array("message" => "FCM PUSH NOTIFICATION TEST MESSAGE");
            $message_status = send_notification($tokens, $message);
            echo $message_status;


        return redirect ('lclabbooking');
        }

        public function showInvoice($id){
            $bookings = Booking::find($id);


            return view('invoice', ['bookings'=>$bookings]);
        }


        public function showProcess($id){
            
            $lc_bookings = Booking::find($id);


        $eight = '8:00 - 9:00';
        $nine = '9:00 - 10:00';
        $ten = '10:00 - 11:00';
        $eleven = '11:00 - 12:00';
        $one = '1:00 - 2:00';
        $two = '2:00 - 3:00';
        $three = '3:00 - 4:00';

        $medtechs_eight = Medtech::where('time_avail',$eight)->where('lab_designation',1)
        ->get();

         $medtechs_nine = Medtech::where('time_avail',$nine)->where('lab_designation',1)
        ->get();

         $medtechs_ten = Medtech::where('time_avail',$ten)->where('lab_designation',1)
        ->get();

         $medtechs_eleven = Medtech::where('time_avail',$eleven)->where('lab_designation',1)
        ->get();

         $medtechs_one = Medtech::where('time_avail',$one)->where('lab_designation',1)
        ->get();

         $medtechs_two = Medtech::where('time_avail',$two)->where('lab_designation',1)
        ->get();

         $medtechs_three = Medtech::where('time_avail',$three)->where('lab_designation',1)
        ->get();


        return view('process', ['lc_bookings'=>$lc_bookings, 'medtechs_eight'=>$medtechs_eight, 'medtechs_nine'=>$medtechs_nine, 'medtechs_ten'=>$medtechs_ten, 'medtechs_eleven'=>$medtechs_eleven, 'medtechs_one'=>$medtechs_one, 'medtechs_two'=>$medtechs_two, 'medtechs_three'=>$medtechs_three]);
        }

    

      
    
}
