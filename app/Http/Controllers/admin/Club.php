<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Club_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Support\Facades\File;

class Club extends Controller
{
    public function index()
    {
        $page_title = "Add Club";
        return view("admin.club.index", compact("page_title"));
    }
    public function report()
    {
        $page_title = "Clubs Report";
        $data = Club_model::all();
        return view("admin.club.report", compact("page_title", "data"));
    }
    public function insert(Request $request)
    {
        try {
            $data = $request->all();

            $validator = Validator::make($data, [
                'name' => 'required',
                'advisor' => 'required',
                'email' => 'required',
                'time' => 'required',
                'date' => 'required',
                'longitude' => 'required',
                'latitude' => 'required',
                'description' => 'required',
            ]);

            if ($validator->fails()) {
                Session::flash('error', implode(',', $validator->getMessageBag()->all()));
                return redirect('admin/create-club');
            } else {
                unset($data['_token']);
                unset($data['logo']);
                if (!empty($request->post("logo"))) {
                    if ($request->hasFile('logo')) {
                        $images = $request->file('logo');
                        $original_name_insert = $images->extension();
                        $insertFileName = rand(5997507956097, 5674433321234) . '.' . $original_name_insert;
                        $images->move(public_path('club'), $insertFileName);
                        $data['logo'] = $insertFileName;
                    }
                }
                $club_id = Club_model::insertGetId($data);
                if (!empty($club_id)) {
                    Session::flash('success', 'Club Added Successfully!');
                    return redirect('admin/club-report');
                } else {
                    Session::flash('danger', 'Club Failed Successfully!');
                    return redirect('admin/club-report');
                }
            }
        } catch (Exception $e) {
            Session::flash("error", $e->getMessage());
            return redirect("admin/create-club");
        }
    }
    public function edit($id)
    {
        try {
            $singleClub = Club_model::find($id);

            if ($singleClub) {
                $page_title = "Edit Club";

                return view("admin.club.edit", compact("page_title", "singleClub"));
            } else {
                Session::flash('error', "Club not found");
                return redirect('admin/club-report');
            }
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return redirect('admin/club-report');
        }
    }
    public function update(Request $request, $id)
    {
        try {
            $data = $request->all();

            $validator = Validator::make($data, [
                'name' => 'required',
                'advisor' => 'required',
                'email' => 'required',
                'time' => 'required',
                'date' => 'required',
                'longitude' => 'required',
                'latitude' => 'required',
                'description' => 'required',
            ]);

            if ($validator->fails()) {
                Session::flash('error', implode(',', $validator->getMessageBag()->all()));
                return redirect('admin/club-edit/' . $id);
            } else {
                unset($data['_token']);

                $club = Club_model::find($id);

                if ($request->hasFile('logo')) {

                    $path = 'public/club/' . $club->logo;
                    if (File::exists($path)) {
                        File::delete($path);
                    }

                    $filename = rand(5997507956097, 5674433321234) . '.' . $request->logo->extension();

                    $request->logo->move(public_path('club'), $filename);
                    $data['logo'] = $filename;
                }
                club_model::where("id", "=", $club->id)->update($data);

                Session::flash('success', 'Club Updated Successfully!');
                return redirect('admin/club-report');
            }
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return redirect('admin/club-edit/' . $id);
        }
    }
    public function delete($id)
    {
        try {
            $club = Club_model::find($id);

            if ($club) {
                $path = 'public/club/' . $club->logo;
                if (File::exists($path)) {
                    File::delete($path);
                }
                $club->delete();
                Session::flash('success', 'Club Deleted Successfully!');
                return redirect('admin/club-report');
            } else {
                Session::flash('error', "club not found");
                return redirect('admin/club-report');
            }
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
            return redirect('admin/club-report');
        }
    }
}
