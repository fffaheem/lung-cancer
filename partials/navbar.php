<?php



if (!isset($_SESSION)) {
  session_start();    
}


$logout = "";
$boolLoggedin = false;
if(isset($_SESSION) and isset($_SESSION["email"]) ){
    // header("location: ../index.php");

    $logout = 
    "
    <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
      <span class='navbar-toggler-icon'></span>
    </button>

    <div class='collapse navbar-collapse' id='navbarNav' style='flex:none'>
      <ul class='navbar-nav'>
        <li class='nav-item'>
          <a class='nav-link' aria-current='page' href='./logOut/logout.php'>Log out</a>
        </li>
      </ul>
    </div>

    ";
    // exit;

}


$nav = 
"
<nav class='navbar navbar-expand-lg bg-body-tertiary bg-dark border-bottom border-body' data-bs-theme='dark'>
  <div class='container-fluid'>
    <a class='navbar-brand' href='#'>Cancer Check</a>

    $logout
  </div>
    
</nav>
";


echo $nav;


?>