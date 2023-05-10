<?php
    $kapcsolat=mysqli_connect("127.0.0.1","root","")
        or die("Csatlakozási hiba!");
    mysqli_select_db($kapcsolat, "oscar");

    $azon=$_REQUEST["azon"];
    $cim=$_REQUEST["cim"];
    $ev=$_REQUEST["ev"];
    $dij=$_REQUEST["dij"];
    $jelol=$_REQUEST["jelol"];


    $sql="update filmek set azon='".$azon."',cim='".$cim."',ev='".$ev."',dij='".$dij."',jelol='".$jelol."' where azon='".$azon."';";

    //print($sql);
     mysqli_query($kapcsolat, $sql);
     mysqli_close($kapcsolat);
     header("Location:index.php");
?>