<?php
use App\Timetable;
use App\Volunteer;

function getVolunteers($id){
  $volunteers = array();
  $volunteer1 = Timetable::where('id','=',$id)->value('volunteerID1');
  array_push($volunteers, $volunteer1);
  $volunteer2 = Timetable::where('id','=',$id)->value('volunteerID2');
  if($volunteer1!=null) array_push($volunteers, $volunteer2);
  $volunteer3 = Timetable::where('id','=',$id)->value('volunteerID3');
  if($volunteer2!=null) array_push($volunteers, $volunteer3);
  return $volunteers;
}

function getDayPerShift($shift_time){
  $shifts = Timetable::where('shift_time','=',$shift_time)->orderBy('id')->get();
  return $shifts;
}

function getShiftTimes(){
  $availableStartTimes = array('9:30 AM'=>'10:30 AM','10:30 AM'=>'11:30 AM','11:30 AM'=>'12:30 PM','12:30 PM'=>'1:30 PM','1:30 PM'=>'2:30 PM','2:30 PM'=>'3:30 PM',
                                '3:30 PM'=>'4:30 PM','4:30 PM'=>'5:30 PM');
  return $availableStartTimes;
}

function getName($id){
  return Volunteer::where("id",$id)->value('name');
}
?>
@extends('layouts.master')
@section('content')
  @include('volunteer.timetable.schedule')
  @include('volunteer.timetable.signup')
@endsection
