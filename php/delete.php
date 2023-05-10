<!doctype html>
<html lang="hu">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Oscar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <h1>Filmek</h1>
    <h2>Törlés</h2>
    
    <?php
    $kapcsolat=mysqli_connect("127.0.0.1","root","")
        or die("Csatlakozási hiba!");
    mysqli_select_db($kapcsolat, "oscar"); 

    $azon = $_REQUEST["azon"];

    $sql="select * from filmek where azon='".$azon."';";

    //print($sql);
    $adat=mysqli_query($kapcsolat, $sql);
    $filmek = mysqli_fetch_assoc($adat);
    //mysqli_close($kapcsolat);

   ?>

  
<div class="container text-center">
  <form action="delete_confirm.php" method="get">

  <div class="mb-3 row d-flex justify-content-center">
    <label for="cim" class="form-label">A film azonosítója: </label>
    <input value="<?php print($filmek['azon']); ?>" type="text"
    class="form-control w-25" id="azon" name="azon" readonly>
  </div>

  <div class="mb-3 row d-flex justify-content-center">
    <label for="cim" class="form-label">A film angol címe: </label>
    <input value="<?php print($filmek['cim']); ?>" type="text" 
    class="form-control w-25" id="cim" name="cim" readonly>
  </div>

  <div class="mb-3 row d-flex justify-content-center">
    <label for="ev" class="form-label">A díjazás éve: </label>
    <input value="<?php print($filmek['ev']); ?>" type="text" 
    class="form-control w-25" id="ev" name="ev" readonly>
  </div>

  <div class="mb-3 row d-flex justify-content-center">
    <label for="dij" class="form-label">Az elnyert díjak száma: </label>
    <input value="<?php print($filmek['dij']); ?>" type="text" 
    class="form-control w-25" id="dij" name="dij" readonly>
  </div>

  <div class="mb-3 row d-flex justify-content-center">
    <label for="jelol" class="form-label">A jelölések száma: </label>
    <input value="<?php print($filmek['jelol']); ?>" type="text" 
    class="form-control w-25" id="jelol" name="jelol" readonly>
  </div>

  <div class="container text-center">
    <h3>Bizos, hogy törlöd a fenti rekordot ?</h3>
    <button type="submit" class="btn btn-success">IGEN</button>       
  </div> 
  
</form>
<form action="index.php" method="get">
  <button type="submit" class="btn btn-danger m-3">NEM</button>
</form>


</div> 


  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>