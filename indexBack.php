<?php


include "./partials/conn.php";

session_start();
if(isset($_SESSION) and isset($_SESSION["email"]) ){
    $sessionEmail = $_SESSION["email"];
    $sessionName = $_SESSION["name"];

}else{
    exit;

}

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $imgName = $_FILES["image"]["name"];
    $imgType = $_FILES["image"]["type"];
    $tmpName = $_FILES["image"]["tmp_name"];


    $imgExplode = explode('.',$imgName);
    $imgExt = end($imgExplode);


    $validExtension = ["png","jpg","jpeg"];




    if(!in_array($imgExt,$validExtension)){
        $myArr = array("fail","Not a valid Extension");
        $myJSON = json_encode($myArr);
        echo "$myJSON";
        exit;
    }

    $time = time();
    $time = hash('sha256',$time);
    $newImgName = $sessionEmail . $time . ".$imgExt";

    move_uploaded_file($tmpName,"./images/".$newImgName);



    $sql = "INSERT INTO `records` (`name`,`email`,`image`,`diagnosis`)
            VALUES ('$sessionName','$sessionEmail','$newImgName','cancer')";

    $res = $conn->query($sql);
    $aff = $conn->affected_rows;
    $id = $conn->insert_id;



    if($aff > 0){
        $myArr = array("success","$id", "$sessionEmail");
        $myJSON = json_encode($myArr);
        echo "$myJSON";
    }else{
        $myArr = array("fail", "Some problem occured please try again later");
        $myJSON = json_encode($myArr);
        echo "$myJSON";
    }

    exit;
    
}

?>