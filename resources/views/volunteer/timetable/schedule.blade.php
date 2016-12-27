@if($errors->any())
  <div class="error-box">
    <h3>{{$errors->first()}}</h3>
  </div>
@endif
<form method="POST" action="{{url('volunteersubmit')}}">
  {!! csrf_field() !!}
    <section>
      <div class="flex-center">
      <table border="1">
        <tr>
          <th><b>Time</b></th>
          <th>Monday</th>
          <th>Tuesday</th>
          <th>Wednesday</th>
          <th>Thursday</th>
          <th>Friday</th>
        </tr>
          @foreach(getShiftTimes() as $shiftStart=>$shiftEnd)
            <tr>
              <td class="time">{{$shiftStart}}<br />{{$shiftEnd}}</td>
                @foreach(getDayPerShift($shiftStart) as $shift)
                  <td class="volunteers">
                    @foreach(getVolunteers($shift->id) as $volunteer)
                        @if($volunteer === NULL)
                          <input type="checkbox" name="check_list[]" value="{{$shift->id}}">Available<br>
                        @else
                          {{getName($volunteer)}}<br />
                        @endif
                    @endforeach
                  </td>
                @endforeach
              </tr>
            @endforeach
        </table>
      </div>
    </section>
