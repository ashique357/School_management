@extends('admin_pannel.admin_master')
@section('component')
<table class="table">
  <thead>
    <tr>
      <th scope="col">Reg no</th>
      @for($i =1;$i<=$days;$i++)
      <th scope="col">{{$i}}</th>
      @endfor
    </tr>
  </thead>
  <tbody>
    @foreach($students as $student)

    <tr>
      <th scope="row">{{$student->reg_no}}</th>

     <td>
       <?php
       $attendances=$student->attendances;
       $temp=array_fill(1,$days,0);
       foreach ($attendances as $attend) {
         $remark=$attend->attendance;
         $t=$attend['date'];
         $year=(int)substr($t,6,10);
         $month=(int)substr($t,0,2);
         $date=(int)substr($t,3,2);
         $att=$attend['attendance'];
         $temp[$date]="1";
       }

?>
<td>
<?php
for ($j=1; $j<=30; $j++) {
  $value=$temp[$j];
  if ($month==$get_month && $year ==$get_year) {
    if ($value == 0) {
      echo "A";
    }
    else {
      echo "P";
    }
  }
 ?>
   <td>
     <?php
      }
      ?>
  </td>
 </td>
</td>

  </tr>
@endforeach
  </tbody>
</table>

@endsection
