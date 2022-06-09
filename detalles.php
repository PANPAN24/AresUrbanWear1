<?php
require 'CONF/config.php';
require 'CONF/database.php';
$db = new Database();
$con = $db->conectar();

$id= isset($_GET['id'])?$_GET['id'] : '';
$token = isset($_GET['token'])?$_GET['token'] : '';

if($id == '' || $token == ''){
  echo 'No se ha podido procesar esa peticion';
  exit;
}else{
  $token_tmp = hash_hmac('sha1', $id, KEY_TOKEN);

      if($token == $token_tmp){

              
        $sql = $con->prepare("SELECT count(id_producto) FROM productos WHERE id_producto = ? AND activo = 1");
        $sql -> execute([$id]);

        if($sql->fetchColumn() >0){

          $sql = $con->prepare("SELECT nombre, descripcion, precio FROM productos WHERE id_producto = ?
           AND activo = 1");
          $sql -> execute([$id]);
          $row = $sql->fetch(PDO::FETCH_ASSOC);
          $nombre = $row['nombre'];
          $descripcion = $row['descripcion'];
          $precio= $row['precio'];
  
        }else{
  echo 'No se ha podido procesar esa peticion';
  exit;
}

       


}else{
  echo 'No se ha podido procesar esa peticion';
  exit;
}

}

;

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
    crossorigin="anonymous">
    <link href="CSS/styles.css" rel="stylesheet">
    <title>Ares Urban Wear</title>
</head>
<body>

<header class="p-3 bg-dark text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
        
        </a>
            
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="#" class="nav-link px-2 text-secondary">Inicio</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Categorias</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Ofertas</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Carrito</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Ayuda</a></li>
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
          <input type="search" class="form-control form-control-dark" placeholder="Buscar" aria-label="Search">
        </form>

        <div class="text-end">
          <button type="button" class="btn btn-outline-light me-2">Acceder</button>
          <button type="button" class="btn btn-warning">Registrarse</button>
        </div>
      </div>
    </div>
  </header>
 

    
<main>

<div class="album py-5 bg-light">
    <div class="container">
        <div class="row">
          <div class = "col-md-6 order-md-1"> 
              <img src="IMG/PROD/1/principal.jpg" alt="" width="350" height="300">
          </div>
          <div class = "col-md-6 order-md-2"> 
                <h1><?php echo $nombre?></h1>
                <h2><?php echo '$' . $precio?></h2>
                <br>
                <h5 class="lead"><?php echo $descripcion?></h5>
                <br>
                
                <div class="d-grid gap-3 col-10 mx-auto">
                    <button class="btn btn-primary" type="button">Comprar ahora</button>
                    <button class="btn btn-outline-primary" type="button">Agregar al carrito</button>
                </div>
              
                
          </div>
        </div>
    </div>
</div>
        

       
    

</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
crossorigin="anonymous"></script>
</body>
</html>