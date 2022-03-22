<!DOCTYPE html>
<html>
<?php $provincia=''; ?>
<head>
     <meta charset="utf-8">
     <meta name="viewport"    content="width=device-width, inicial-scale=1">
     <meta name="description" content="lupulandia focaliza en encontrar en segundos donde beber, comprar insumos, visitar cervecerias">
    <script src="js/navbar.js"></script>

    <link rel="stylesheet" type="text/css" href="class/styles.css">
    <link rel = "icon" href ="img/hops-icon.png" type = "image/x-icon">

  <title>Lupulandia</title>
</head>

<body>
<header>
          <h1>LUPULANDIA</h1>
          <p> tu mundo cervecero</p>
</header>

  <nav>
    <ul>
      <li><a class="nav-link" href="index.html">noticias lupuladas</a></li>
      <li><a href="#">cervecerias</a></li>
      <li><a class="nav-link" href="barescanilleros.php">bares canilleros</a></li>
      <li><a class="nav-link" href="insumos.php">insumos</a></li>
      <li><a class="nav-link" href="capacitatete.php">capacitate</a></li>
    </ul>
  </nav>


<section>
<div class="container">
 <b>CERVECERIAS DE ELABORACION ARTESANAL</b>
      <p>Para agregar una cervecería que no esté en la lista, porfavor enviá un mail a <a href="">insumos@lupulandia.com.ar</a></p>
        <br>
      <p>Elegi en que zona queres buscar:</p>
           <form action="#" method="post">
            <select name="provincia">
        <?php
        $newmysqli = new mysqli("127.0.0.1", "root","", "lupulandia");
          $query = $newmysqli -> query ("SELECT * FROM locales_insumos");

          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores[provincia].'">'.$valores[provincia].'</option>';
          }
        ?>
      </select>
      <input type="submit" value="Buscar" name="busqinsumos">
      </form>

          <br>
          <div class="tablaresultados">
   <table>
              <thead>
                <tr>
              <th> Local </th>
              <th> Direccion </th>
              <th> WWW </th>
              <th><img src="img/logo_facebook.png" alt="Facebook"><img src="img/logo_instagram.png" alt="Instagram"></th>
              <th> Teléfono </th>
              <th> GMAPS </th>
            </tr>
            </thead>
       <tbody>

<?php 

if (isset($_POST['busqinsumos'])) {
    $provincia = $_POST['provincia'];
    $qryinsumos = "SELECT nombre, direccion, web, instagram, telefono, ubicacion_gmaps FROM locales_insumos WHERE provincia = '$provincia';";
    $resultado = $newmysqli->query($qryinsumos) or die($newmysqli->error);

echo $provincia;
  while($row = $resultado->fetch_assoc()) {
            echo "<tr><td>".$row["nombre"]."</td>";
            echo "<td>".$row["direccion"]."</td>";
            echo "<td>".$row["web"]."</td>";
            echo "<td><a href=".$row["instagram"]."> ".$row["instagram"]."</a></td>";
            echo "<td>".$row["telefono"]."</td>";
            echo "<td><a href=".$row["ubicacion_gmaps"].">Link Mapa</a></td></tr>";

  }
          $resultado->free();
          $newmysqli->close();
} 
          ?>
            
</tbody></table></div>
</div>
</section>

<aside>
  <div class="mas_visitados">   
      <table class="insumos">
              <h4> MAS VISITADOS - MAYO </h4>
              <br>
              <ul>Lorem ipsum</ul>
              <ul>Quos nostrum blanditiis</ul>
              <ul>Laudantium molestiae</ul>
   </table>  
  </div>
      
      <br>   

  <div class="banner_sponsors">
      <b>SPONSORS</b>
      <br>  
      <img src="img/logo_antares.png" alt="">
      <img src="img/logo_berlina.png" alt="">
  </div>
</aside>

<footer>
      <p>Lupulandia - 2020 - creado por MadBrewer</p>
</footer>

</body>
</html>