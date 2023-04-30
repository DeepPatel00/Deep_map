<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Club_model;
use App\Models\Club_register_model;
use App\Models\Event_model;
use App\Models\Event_register;
use App\Models\Student;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class Frontend extends Controller
{
    public function index(){
        $page_title = 'Dashboard';

        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.weatherapi.com/v1/current.json?key=6ed625379f1a4791be1233628220104&q=32.056629,-84.217672&days=3&aqi=no&alerts=yes',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $data = json_decode($response, true);

        $textTitle = 'Partly cloudy';
        $icon = 'https://cdn.weatherapi.com/weather/64x64/day/116.png';
        if(!empty($data)){
            $textTitle = isset($data['current']['condition']['text']) ? $data['current']['condition']['text'] : 'Partly cloudy';
            $icon = isset($data['current']['condition']['icon']) ? $data['current']['condition']['icon'] : 'https://cdn.weatherapi.com/weather/64x64/day/116.png';
        }
        

        return view("frontend.home", compact('page_title','textTitle','icon'));
    }
    public function event(){
        // $data = Event_model::where('date','>=',)->all();
        $data=DB::table('event')
                ->whereDate('date', '>=', date('Y-m-d'))
                ->get();
        $page_title = 'Events';
        return view("frontend.events", compact('page_title', "data"));
    }
    public function club()
    {
        $page_title = 'Club';
        // $data = Club_model::all();
        $data=DB::table('club')
                ->whereDate('date', '>=', date('Y-m-d'))
                ->get();
        return view("frontend.club", compact('page_title',"data"));
    }
    public function Club_Details($id){
        $page_title = 'Club Details';
        $data = Club_model::find($id);
        return view("frontend.details", compact('page_title', "data"));
    }
    public function Event_Details($id){
        $page_title = 'Events Details';
        $data = Event_model::find($id);
        return view("frontend.details", compact('page_title', "data"));
    }
    public function map()
    {
        $page_title = 'Map';
        $club = Club_model::select('name', 'longitude', 'latitude')->get();
        $event = Event_model::select('name', 'longitude', 'latitude')->get();
        return view("frontend.map", compact('page_title',"club",'event'));
    }
    public function thank_you($title){
        $page_title = 'Thank You';
        return view("frontend.thank", compact('page_title', "title"));
    } 
    public function CheckRegister(Request $request){
        try {
            $data = $request->all();
            $num_rows = Student::select('email','name')->where('rsvp_no', $data['no']);

            if($num_rows->count()==1){
                $student =  Student::where(['rsvp_no'=> $data['no']])->first();
                if($data['type']=="event"){
                $check = Event_register::where(['student_id'=> $student->id, 'event_id' => $data['event_id']])->count();
                if($check>0){
                    $r['already'] = true;    
                }else{
                    $r['already'] = false; 
                }
                    
                }else{
                  $check = Club_register_model::where(['student_id' => $student->id, 'club_id' => $data['club_id']])->count();
                if($check>0){
                    $r['already'] = true;    
                }else{
                    $r['already'] = false; 
                }  
                }
                $r['status'] = true;
                $r['data']= $num_rows->first();
            }else{
                $r['status'] = false;
            }

            echo json_encode($r);
        } catch (Exception $e) {
            return false;
        }
    }
    public function register_event(Request $request)
    {
        try {
            $data = $request->all();

            $validator = Validator::make($data, [
                'rsvp' => 'required',
                'name' => 'required',
                'email' => 'required',
            ]);

            if ($validator->fails()) {
                Session::flash('error', implode(',', $validator->getMessageBag()->all()));
                return redirect('/events');
            } else {
                unset($data['_token']);
                $num_rows = Student::where('rsvp_no', $data['rsvp'])->count();
                if($num_rows==0){
                    $student_id = Student::insertGetId(['rsvp_no'=> $data['rsvp'], 'name' => $data['name'], 'email' => $data['email']]);
                    Event_register::insert(['student_id'=> $student_id,'event_id'=>$data['event_id']]);
                    Session::put('sname',$data['name']);
                    Session::flash('success', 'Event Register Successfully!');
                    return redirect('thank-you/event');
                }else{
                    $student =  Student::where(['rsvp_no'=> $data['rsvp']])->first();
                    $check = Event_register::where(['student_id'=> $student->id, 'event_id' => $data['event_id']])->count();
                    if($check==0){
                        Event_register::insert(['student_id' => $student->id, 'event_id' => $data['event_id']]);
                        Session::flash('success', 'Event Register Successfully!');
                        return redirect('thank-you/event');
                    }else{
                        Session::flash('success', 'already Registered Successfully!');
                        return redirect('events');
                    }
                }
            }
        } catch (Exception $e) {
            Session::flash("error", $e->getMessage());
            return redirect("events");
        }
    }
    public function register_club(Request $request)
    {
        try {
            $data = $request->all();

            $validator = Validator::make($data, [
                'rsvp' => 'required',
                'name' => 'required',
                'email' => 'required',
            ]);

            if ($validator->fails()) {
                Session::flash('error', implode(',', $validator->getMessageBag()->all()));
                return redirect('/club');
            } else {
                unset($data['_token']);
                $num_rows = Student::where('rsvp_no', $data['rsvp'])->count();
                if ($num_rows == 0) {
                    $student_id = Student::insertGetId(['rsvp_no' => $data['rsvp'], 'name' => $data['name'], 'email' => $data['email']]);
                    Club_register_model::insert(['student_id' => $student_id, 'club_id' => $data['club_id']]);
                    Session::put('sname',$data['name']);
                    Session::flash('success', 'Club Register Successfully!');
                    return redirect('thank-you/club');
                } else {
                    $student =  Student::where(['rsvp_no' => $data['rsvp']])->first();
                    $check = Club_register_model::where(['student_id' => $student->id, 'club_id' => $data['club_id']])->count();
                    if ($check == 0) {
                        Club_register_model::insert(['student_id' => $student->id, 'club_id' => $data['club_id']]);
                        Session::flash('success', 'Club Register Successfully!');
                        return redirect('thank-you/club');
                    } else {
                        Session::flash('success', 'already Registered Successfully!');
                        return redirect('club');
                    }
                }
            }
        } catch (Exception $e) {
            Session::flash("error", $e->getMessage());
            return redirect("club");
        }
    }
}
