<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Event_model;
use App\Models\Event_register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Support\Facades\File;

class Event extends Controller
{
    public function index()
    {
        $page_title = "Add Event";
        return view("admin.event.index", compact("page_title"));
    }
    public function report()
    {
        $page_title = "Events Report";
        $data = Event_model::all();
        return view("admin.event.report", compact("page_title", "data"));
    }
    public function RegisterReport()
    {
        $page_title = "Event Register Report";
        $data = DB::select("SELECT 'Club' as stype,student.rsvp_no,club.name,club_register.created_at,student.name as sname,student.email as semail FROM `club_register` LEFT JOIN club ON club.id=club_register.club_id LEFT JOIN student ON student.id=club_register.student_id
        UNION ALL
        SELECT 'Event' as stype,student.rsvp_no, event.name,event_register.created_at,student.name as sname,student.email as semail FROM `event_register` LEFT JOIN event ON event.id=event_register.event_id LEFT JOIN student ON student.id=event_register.student_id");
        return view("admin.event.register_report", compact("page_title", "data"));
    }
    public function insert(Request $request)
    {
        try {
            $data = $request->all();

            $validator = Validator::make($data, [
                'name' => 'required',
                'time' => 'required',
                'date' => 'required',
                'longitude' => 'required',
                'latitude' => 'required',
                'description' => 'required',
            ]);

            if ($validator->fails()) {
                Session::flash('error', implode(',', $validator->getMessageBag()->all()));
                return redirect('admin/create-event');
            } else {
                unset($data['_token']);
                unset($data['img']);
                if (!empty($request->post("img"))) {
                    if ($request->hasFile('img')) {
                        $images = $request->file('img');
                        $original_name_insert = $images->extension();
                        $insertFileName = rand(5997507956097, 5674433321234) . '.' . $original_name_insert;
                        $images->move(public_path('event'), $insertFileName);
                        $data['img'] = $insertFileName;
                    }
                }
                $event_id = Event_model::insertGetId($data);
                if (!empty($event_id)) {
                    Session::flash('success', 'Event Added Successfully!');
                    return redirect('admin/events-report');
                } else {
                    Session::flash('danger', 'Event Added Successfully!');
                    return redirect('admin/events-report');
                }
            }
        } catch (Exception $e) {
            Session::flash("error", $e->getMessage());
            return redirect("admin/create-event");
        }
    }
    public function edit($id)
    {
        try {
            $singleEvent = Event_model::find($id);

            if ($singleEvent) {
                $page_title = "Edit event";

                return view("admin.event.edit", compact("page_title", "singleEvent"));
            } else {
                Session::flash('error', "event not found");
                return redirect('admin/events-report');
            }
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return redirect('admin/events-report');
        }
    }
    public function update(Request $request, $id)
    {
        try {
            $data = $request->all();

            $validator = Validator::make($data, [
                'name' => 'required',
                'time' => 'required',
                'date' => 'required',
                'longitude' => 'required',
                'latitude' => 'required',
                'description' => 'required',
            ]);

            if ($validator->fails()) {
                Session::flash('error', implode(',', $validator->getMessageBag()->all()));
                return redirect('admin/event-edit/' . $id);
            } else {
                unset($data['_token']);

                $event = Event_model::find($id);

                if ($request->hasFile('img')) {

                    $path = 'public/event/' . $event->img;
                    if (File::exists($path)) {
                        File::delete($path);
                    }

                    $filename = rand(5997507956097, 5674433321234) . '.' . $request->img->extension();

                    $request->img->move(public_path('event'), $filename);
                    $data['img'] = $filename;
                }
                if (empty($data['is_world'])) {
                    $data['is_world'] = 0;
                }
                Event_model::where("id", "=", $event->id)->update($data);

                Session::flash('success', 'Event Updated Successfully!');
                return redirect('admin/events-report');
            }
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return redirect('admin/event-edit/' . $id);
        }
    }
    public function delete($id)
    {
        try {
            $event = Event_model::find($id);

            if ($event) {
                $path = 'public/event/' . $event->img;
                if (File::exists($path)) {
                    File::delete($path);
                }
                $event->delete();
                Session::flash('success', 'Event Deleted Successfully!');
                return redirect('admin/events-report');
            } else {
                Session::flash('error', "Event not found");
                return redirect('admin/events-report');
            }
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return redirect('admin/events-report');
        }
    }
}
