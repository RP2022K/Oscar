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
    
    <?php
    // phpinfo();
     ?>
  
<div class="container">
  <form action="adatfelvitel.php" method="get">

  <div class="mb-3">
    <label for="azon" class="form-label">A film azonosítója: </label>
    <input type="text" class="form-control" id="azon" name="azon">    
  </div>

  <div class="mb-3">
    <label for="cim" class="form-label">A film angol címe: </label>
    <input type="text" class="form-control" id="cim" name="cim">    
  </div>

  <div class="mb-3">
    <label for="ev" class="form-label">A díjazás éve: </label>
    <input type="text" class="form-control" id="ev" name="ev">    
  </div>

  <div class="mb-3">
    <label for="dij" class="form-label">Az elnyert díjak száma: </label>
    <input type="text" class="form-control" id="dij" name="dij">    
  </div>

  <div class="mb-3">
    <label for="jelol" class="form-label">A jelölések száma: </label>
    <input type="text" class="form-control" id="jelol" name="jelol">    
  </div>

  <button type="submit" class="btn btn-primary">Új felvétele</button>
  
</form>

 

<?php
    $kapcsolat=mysqli_connect("127.0.0.1","root","")
        or die("Csatlakozási hiba!");
    
    mysqli_select_db($kapcsolat, "oscar"); 

    $sql="select * from filmek;";
    //print($sql);
    $filmek=mysqli_query($kapcsolat, $sql);

    mysqli_close($kapcsolat);

    while($sor=mysqli_fetch_assoc($filmek)){
?>
  <div class="row my-2">
      <div class="col"><?php print($sor["azon"]); ?></div>
      <div class="col"><?php print($sor["cim"]); ?></div>
      <div class="col"><?php print($sor["ev"]); ?></div>
      <div class="col"><?php print($sor["dij"]); ?></div>
      <div class="col"><?php print($sor["jelol"]); ?></div>
      <div class="col">
        <a href="delete.php?azon=<?php print $sor['azon'] ?>" class="btn btn-danger">Törlés</a>
      </div>
      <div class="col">     
        <a href="modosit.php?azon=<?php print $sor['azon'] ?>" class="btn btn-warning">Módosítás</a>
      </div>
  </div>
<?php
    }
?>

</div> 


  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>