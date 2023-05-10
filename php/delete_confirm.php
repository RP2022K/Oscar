<?php
    $kapcsolat=mysqli_connect("127.0.0.1","root","")
        or die("Csatlakozási hiba!");
    mysqli_select_db($kapcsolat, "oscar");

    $azon=$_REQUEST["azon"];

    $sql="delete from filmek where azon='".$azon."';";

    //print($sql);
    mysqli_query($kapcsolat, $sql);
    mysqli_close($kapcsolat);
    header("Location:index.php");

?>