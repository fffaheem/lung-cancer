<?php

include "./partials/conn.php";
session_start();
$boolLoggedin = false;
if(isset($_SESSION) and isset($_SESSION["email"]) ){
  $sessionUsername = $_SESSION["email"];
  $boolLoggedin = true;

}else{
  header("location: ./login.html");

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>
    
    <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark border-bottom border-body" data-bs-theme="dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Cancer Check</a>
        </div>
    </nav>


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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</html>