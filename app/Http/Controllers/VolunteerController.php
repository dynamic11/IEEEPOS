<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use App\Timetable;
use App\Volunteer;
use Illuminate\Http\Request;
use Validator;
use Redirect;
use Mail;

class VolunteerController extends Controller{

  public function showTimeTable(){
    return view('volunteer.volunteer');
  }

  //Returns true if the volunteer is already signed up for a shift.
  public function alreadyVolunteering($shift, $id){
    $volunteers = Timetable::select('volunteerID1','volunteerID2','volunteerID3')->where('id', $shift)->first();
    return ($volunteers->volunteerID1==$id || $volunteers->volunteerID2==$id || $volunteers->volunteerID3==$id);
  }

  public function sendInvoice($shiftsSelected, $volunteer){

    $shifts = Timetable::whereIn('id', $shiftsSelected)->get();

    Mail::send('emails.volunteerinvoice', ['shiftsSelected'=> $shifts, 'volunteer'=>$volunteer], function ($m) use ($volunteer){
      $m->from('no_reply@alinouri.link', 'IEEE Carleton');
      $m->to($volunteer->email, $volunteer->name)->subject('IEEE Carleton Volunteer Sign-Up');
    });
  }

  public function submit(Request $request){

    $validator = Validator::make($request->all(), [
      'name' => 'required|max:255',
      'email' => 'required|email'
    ]);

    if ($validator->fails())
    {
        return Redirect::to('/volunteer')->withErrors(['Invalid information.']);
    }

    //Check if volunteer already exists in the database.
    if(Volunteer::where("email",$request->email)->exists()){
      $volunteer = Volunteer::where("email",$request->email)->get()->first();
      if($volunteer->name != $request->name){ //Validate correct volunteer. Identified by email.
        return Redirect::to('/')->withErrors(['Email already associated with different volunteer.']);
      }
    }else{
      $volunteer = new Volunteer;
      $volunteer->name = $request->name;
      $volunteer->email = $request->email;
      $volunteer->save();
    }

    if(!empty($_POST['check_list'])){
      $shiftsSelected = $_POST['check_list'];
      foreach($shiftsSelected as $shift){
        if(!$this->alreadyVolunteering($shift, $volunteer->id)){
          if(Timetable::where('id',$shift)->value('volunteerID1')==NULL) Timetable::where('id',$shift)->update(array('volunteerID1'=>$volunteer->id));
          elseif(Timetable::where('id',$shift)->value('volunteerID2')==NULL) Timetable::where('id',$shift)->update(array('volunteerID2'=>$volunteer->id));
          else Timetable::where('id',$shift)->update(array('volunteerID3'=>$volunteer->id));
        }
      }
      $this->sendInvoice($shiftsSelected,$volunteer);
    }else{
      return Redirect::to('/volunteer')->withErrors(['Please select shift(s).']);
    }
    return redirect('/volunteer');
  }

}
