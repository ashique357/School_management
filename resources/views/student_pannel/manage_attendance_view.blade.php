@extends('student_pannel.student_master');
@section('component')
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Date</th>
      @for($i=1;$i<=$days;$i++)
        <th scope="col">{{$i}}</th>
      @endfor
    </tr>
    <td>{{$get_student_id->reg_no}}</td>
    <td>
      <?php
      $today = Carbon\Carbon::now();
      $mytime=(int)$today->format('d'); // Equivalent: echo $dt->format('Y-m-d');
     ?>
      <?php
        $temp=array_fill(1,$days,0);
        for ($i=0; $i <sizeof($attendances) ; $i++) {
         $t=$attendances[$i]['date'];
         $year=(int)substr($t,6,10);
         $month=(int)substr($t,0,2);
         $date=(int)substr($t,3,2);
         $attend=$attendances[$i]['attendance'];
         $temp[$date]="1";
       }

       for ($j=1; $j<=$days; $j++) {
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
  </thead>
  <tbody>


  </tbody>
</table>
@endsection
