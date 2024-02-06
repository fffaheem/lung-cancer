<?php

include "./partials/conn.php";
session_start();
$boolLoggedin = false;
if(isset($_SESSION) and isset($_SESSION["email"]) ){
  $sessionUsername = $_SESSION["email"];
  $boolLoggedin = true;

}else{
  header("location: ./login/login.php");

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

        <form class="my-5">
            <div class="mb-3">
                <label for="formFile" class="form-label">Upload Lung MRI images</label>
                <input class="form-control" type="file" id="formFile">
              </div>
            <button type="submit" class="btn btn-primary">Check</button>
        </form>



    </div>


    <div class="container-sm my-5">

        <div class="my-5">
            <h2 class="text-center">Old Records</h2>
        </div>

        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td colspan="2">Larry the Bird</td>
                <td>@twitter</td>
              </tr>
            </tbody>
          </table>


    </div>

</body>
</html>