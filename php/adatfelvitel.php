<?php
    $kapcsolat=mysqli_connect("127.0.0.1","root","")
        or die("Csatlakozási hiba!");
    mysqli_select_db($kapcsolat, "oscar");

    $azon=$_REQUEST["azon"];
    $cim=$_REQUEST["cim"];
    $ev=$_REQUEST["ev"];
    $dij=$_REQUEST["dij"];
    $jelol=$_REQUEST["jelol"];

    console_log($azon);

    $sql="insert into filmek values ('".$azon."','".$cim."','".$ev."','".$dij."','".$jelol."');";
    //print($sql);
    mysqli_query($kapcsolat, $sql);
    mysqli_close($kapcsolat);
    header("Location:index.php");

    function console_log($output, $with_script_tags = true) {
        $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
    ');';
        if ($with_script_tags) {
            $js_code = '<script>' . $js_code . '</script>';
        }
        echo $js_code;
    }

?>