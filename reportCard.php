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


    echo "
    <script>
        let xhr = new XMLHttpRequest();
        url = 'http://127.0.0.1:5000/getResult?image=$image'
        xhr.open('GET', url, true);

        xhr.onload = () => {
            let data = xhr.responseText;
            data = JSON.parse(data)['result'];
            console.log(data)
        }

        xhr.send();
    </script>
    ";
    
    // echo $diagnosis;



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

        <div class="card mb-3">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="./images/kulsoomzahra24@gmail.com052a88c62e53dd54623c83e65bcf93c5609d4366bef07a3658a6b7d78d3595b0.png" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                  <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                </div>
              </div>
            </div>
        </div>


    </div>





</body>
</html>