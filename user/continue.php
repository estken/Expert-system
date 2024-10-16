  <?php
  include 'connection.php';
  $b=$_POST['f'];
  $b=$b*5;
  $c=$b+4;
  $select="SELECT * from symptoms where id >$b AND id<=($c+1)";
  $query=mysqli_query($conn,$select);


  echo "<div class='table-responsive'><table class='table' ><thead><tr><th>Symptoms</th><th>response</th></thead></tr><tbody>";
  $val=(int)mysqli_num_rows($query);

  while($row=mysqli_fetch_array($query)){
    echo "<tr><td><input type='submit' id='symptoms' class='btn btn-mini' value='".$row['symptom']."'></td><td><select class='form-control form-horizontal' id='opt'>
    <option>High</option>
    <option>Moderate</option>
    <option>Low</option>
    <option>None</option>

    </select></td></tr>";
  }
  if (($b-1)>=$val){
    echo "</tbody></table></div><div class='form-group'>
    <div class='col-sm-12'>
    <ul class='pager'>
    <li class='previous btn btn-mini' id='previous'><a href='#'>Previous</a></li>

    <li class='next btn btn-mini' id='process'><a href='#'>Submit</a></li>
    </ul></div>
    </div>
    ";}
    else{
      echo"</tbody></table></div><div class='form-group'>
      <div class='col-sm-12'>
      <ul class='pager'>
      <li class='previous btn btn-mini' id='previous'><a href='#'>Previous</a></li>
      <li class='next btn btn-mini' id='regss'><a href='#'>Next</a></li>
      </ul>                    </div>
      </div>
      ";
    }
    ?>
