
<table class="table table-dark table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Họ tên</th>
      <th scope="col">Ngày bắt đầu</th>
      <th scope="col">Môn học</th>
      <th scope="col">Giáo viên hướng dẫn</th>
      
      <!-- <th scope="col">Tên giáo viên</th> -->
    </tr>
  </thead>
  <tbody>
    <?php 
    $i = 0;
    foreach( $students as  $student ) {
        $i++;
        echo "<tr>";
        echo  "<th scope='row'>".$i."</th>";
        echo  "<td>".$student->name."</td>";
        echo  "<td>".$student->date."</td>";
        echo "<td>" .$student->subject. "</td>";
        echo  "<td>".$student->teacher_name."</td>";
        echo "</tr>";
    }
   
  ?>
  </tbody>
</table>
