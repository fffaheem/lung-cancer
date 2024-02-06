<?php

include "./partials/conn.php";
session_start();

if(isset($_GET) and isset($_GET["id"]) and isset($_GET["email"])){
    $id = $_GET["id"];
    $email = $_GET["email"];

    $sql = "SELECT * FROM `records` where `s_no` = '$id' and `email` = '$email'";
    $result = $conn->query($sql);
    $aff = $conn->affected_rows;

    if($aff < 1){
      echo "Some Error occured";
      exit;
    }

    $data = $result->fetch_object();
    $name = $data->{"name"};
    $image = $data->{"image"};
    $diagnosis = $data->{"diagnosis"};
    $time = $data->{"time"};
    $message = "";
    if($diagnosis == 'Benign'){
      $message = "Dear $name,<br> I\'m pleased to share that your recent lung cancer screening results indicate a <b>Benign</b> diagnosis. This means no malignant or concerning abnormalities were detected. Feel free to reach out if you have any questions or need further information. Take care and stay well!<br>Sincerely, <br>Team .";
    }else if($diagnosis == 'Malignant'){
      $message = "Dear $name,<br> I regret to inform you that your recent lung cancer screening has revealed a diagnosis of <b>Malignant</b>. Please know that we are committed to providing you with the necessary support and guidance moving forward. Our healthcare team is here to discuss the next steps, answer any questions you may have, and develop a comprehensive plan tailored to your needs. Your well-being is our top priority, and we are dedicated to assisting you through this challenging time.<br>Sincerely, <br>Team .";
    }else if($diagnosis == 'Normal'){
      $messageL = "Dear $name,<br> Great news! Your recent lung cancer screening came back as <b>Normal</b> No abnormalities were detected. Keep up the good work with your proactive health measures. If you have any questions or need further guidance, feel free to reach out. Take care!<br>Best regards, <br>Team .";
    }else{
      $message = "Sorry for the Incovenience, We are Working on Getting Better EveryDy.";
    }

    $diagnosisCard = 
    "
    <div class='card mb-3'>
      <div class='row g-0'>
        <div class='col-md-4'>
          <img src='./images/$image' class='img-fluid rounded-start' alt='...'>
        </div>
        <div class='col-md-8'>
          <div class='card-body'>
            <h5 class='card-title'>$name</h5>
            <p class='card-text'><small class='text-body-secondary'>$email</small></p>
            <p class='card-text'>$message</p>
            <p class='card-text'><small class='text-body-secondary'>$time</small></p>
          </div>
        </div>
      </div>
    </div>
    ";



}else{
  header("location: ./index.php");
  exit;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "./partials/links.php"; ?>
    <title>Report Card</title>
</head>
<body>
    
    <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark border-bottom border-body" data-bs-theme="dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Cancer Check</a>
        </div>
    </nav>


    <div class="container-sm my-5">

        <div class="my-5">
            <h2 class="text-center">Report Card</h2>
        </div>

        <?php echo $diagnosisCard; ?>


    </div>





</body>
</html>