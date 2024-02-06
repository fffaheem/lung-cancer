<?php

include "./partials/conn.php";
session_start();
$boolLoggedin = false;
if(isset($_SESSION) and isset($_SESSION["email"]) ){
  $sessionEmail = $_SESSION["email"];
  $boolLoggedin = true;

}else{
  header("location: ./login/login.php");
  exit;
}


$record = "";

$sql = "SELECT * FROM `records` where `email` = '$sessionEmail'";
$result = $conn->query($sql);
$aff = $conn->affected_rows;

if($aff < 1){
  $record = "Nothing to show here";
}else{

  $record = 
  "
  <table class='table'>
  <thead>
    <tr>
      <th scope='col'>#</th>
      <th scope='col'>Name</th>
      <th scope='col'>Email</th>
      <th scope='col'>Diagnosis</th>
      <th scope='col'>Time</th>
    </tr>
  </thead>
  <tbody>
  ";
  $sno = 0;
  while($data=$result->fetch_object()){
      $sno = $sno + 1;
      $name = $data->{"name"};
      $id = $data->{"s_no"};
      $email = $data->{"email"};
      $diagnosis = $data->{"diagnosis"};
      $time = $data->{"time"};
      $image = $data->{"image"};

      $record .= 
      "
      <tr>
        <th scope='row'>$sno</th>
        <td>$name</td>
        <td>$email</td>
        <td> <a href='./reportCard.php?id=$id&email=$email'> $diagnosis </a> </td>
        <td>$time</td>
      </tr>
      ";
  }

  $record .= 
  "
  </tbody>
  </table>
  ";

}





?>


<!DOCTYPE html>
<html lang="en">
<head>
  <?php include "./partials/links.php"; ?>
  <title>Cancer Prediction</title>
</head>
<body>
    
    <?php   include "./partials/navbar.php";  ?>


    <div class="container-sm my-5">

        <div class="my-5">
            <h2 class="text-center">Check Result</h2>
        </div>

        <div id="liveAlertPlaceholder"></div>

        <form class="my-5" id="form">
            <div class="mb-3">
                <label for="image" class="form-label">Upload Lung MRI images</label>
                <input class="form-control" type="file" id="image" name="image" accept=".jpg, .png, .jpeg" required>
              </div>
            <button type="submit" id="btn" class="btn btn-primary">Check</button>
        </form>



    </div>


    <div class="container-sm my-5">

        <div class="my-5">
            <h2 class="text-center">Old Records</h2>
        </div>

        <?php echo $record ?>

    </div>

</body>
<script src="./index.js"></script>
</html>