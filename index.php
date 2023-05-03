<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ADIT 2022 - 24 @Dehradun</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>

<body>
  <nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="30" height="24" class="d-inline-block align-text-top">
        NSTI Dehradun
      </a>
    </div>
  </nav>
  <form method="post">

    <div class="m-3">
      <label for="reg_no" class="form-label">Registraion Number: </label>
      <input type="number" class="form-control" id="reg_no" name="Reg_No" placeholder="Registraion Number" required>
    </div>

    <div class="m-3">
      <label for="t_name" class="form-label">Trainee's Name: </label>
      <input type="text" class="form-control" id="t_name" name="T_name" placeholder="Trainee's Name">
    </div>

    <div class="m-3">
      <label for="t_mobile" class="form-label">Mobile: </label>
      <input type="number" class="form-control" id="t_mobile" name="Mobile" placeholder="Mobile">
    </div>

    <div class="m-3">
      <label for="t_nsti" class="form-label">NSTI: </label>
      <input type="text" class="form-control" id="t_nsti" name="nsti" placeholder="NSTI">
    </div>

    <div class="m-3">
      <label for="date" class="form-label">NSTI: </label>
      <input type="date" class="form-control" id="date" name="date" placeholder="Date">
    </div>

    <button type="submit" class="btn btn-primary m-3" name="Onclick">Submit</button>
    <button type="submit" class="btn btn-danger m-3" name="Ondelete">Delete</button>
    <button type="submit" class="btn btn-primary m-3 " name="Onedit">Update</button>
    <!-- <button type="submit" class="btn btn-primary m-3" name="Onread">Read</button> -->
  </form>
</body>

</html>
<?php

// Server Connectivity
$server = "localhost";
$user = "root";
$pass = "";
$db = "adit";
$con = mysqli_connect($server, $user, $pass, $db);

// data insertion 
if (isset($_POST['Onclick'])) {
  $reg = $_POST['Reg_No'];
  $tname = $_POST['T_name'];
  $tmobile = $_POST['Mobile'];
  $nsti = $_POST['nsti'];
  $date = $_POST['date'];

  $sql = "INSERT INTO curd(reg_no, trainee_name, phone_no, nsti, reg_date)
values('$reg','$tname','$tmobile', '$nsti','$date')";
  $output = mysqli_query($con, $sql);
  if ($output) {
    echo "<br>Inserted";
  } else {
    echo "<br>Not Inserted";
  }
}

// deletation of data from curd
if (isset($_POST['Ondelete'])) {
  $tmobile = $_POST['Mobile'];
  $d_sql = "DELETE FROM curd WHERE curd.phone_no=$tmobile";
  $output = mysqli_query($con, $d_sql);
  if ($output) {
    echo "<br>Record Deleted";
  } else {
    echo "<br>Not Deleted";
  }
}
// Updation of data
if (isset($_POST['Onedit'])) {
  $reg = $_POST['Reg_No'];
  $tname = $_POST['T_name'];
  $tmobile = $_POST['Mobile'];
  $nsti = $_POST['nsti'];
  $date = $_POST['date'];
  $u_sql = "UPDATE  `curd` SET `reg_no` = '$reg' ,`trainee_name` = '$tname',`nsti` = '$nsti', `reg_date` = '$date' WHERE `curd`.`phone_no` = '$tmobile'";
  $output = mysqli_query($con, $u_sql);
  if ($output) {
    echo "<br>Record Updated";
  } else {
    echo "<br>Not Updated";
  }
}
?>
<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>


  <h1>TOTAL DATA</h1>

  <table class="table table-bordered table-hover">
    <thead>
      <tr>
        <th>Registration_No</th>
        <th>Trainee's Name</th>
        <th>Mobile</th>
        <th>Location</th>
        <th>Reg_Date</th>
      </tr>
    </thead>
    <tbody>
      <?php
      //Read
      $select = "select * from curd";
      $result = mysqli_query($con, $select);
      while ($data = mysqli_fetch_array($result)) {
        echo '<tr>';
        echo '<td>' . $data['reg_no'] . '</td>';
        echo '<td>' . $data['trainee_name'] . '</td>';
        echo '<td>' . $data['phone_no'] . '</td>';
        echo '<td>' . $data['nsti'] . '</td>';
        echo '<td>' . $data['reg_date'] . '</td>';
        echo '</tr>';
      }
      ?>
    </tbody>
  </table>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>