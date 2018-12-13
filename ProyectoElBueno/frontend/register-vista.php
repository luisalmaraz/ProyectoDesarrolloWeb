<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inicio Sesión / Registro</title>
    
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

    <link rel="stylesheet" href="../css/esstilos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
</head>
<body>
    
<div class="contenido">
        <div class="header">
            <div class="logo-titulo">
                <img src="../image/12.png" alt="">
				<a href="../principal.php"><h2>Bienvenido</h2></a>
            </div>
            <div class="menu">
                <a href="login-vista.php"><li class="module-login">Inicia Sesión</li></a>
                <a href="register.php"><li class="module-register active">Registro</li></a>
            </div>
        </div>
        <!-- <?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> -->
     
            <div class="bienvenido"><h1>Bienvenido</h1></div>
            
            <div class="user line-input">
                <label></label>
                <input type="email" placeholder="
 Correo" name="correo" id="correo">
            </div>
            <div class="user line-input">
                <label class="lnr lnr-user"></label>
                <input type="text" placeholder="
 Nombre Usuario" name="usuario" id="usuario">
            </div>
            <div class="password line-input">
                <label class="lnr lnr-lock"></label>
                <input type="password" placeholder=" Contraseña" name="clave" id="clave">
            </div>
            <div class="password line-input">
                <label class="lnr lnr-lock"></label>
                <input type="password" placeholder=" Confirmar contraseña" name="clave2" id="clave2">
            </div>
            
            <?php if(!empty($error)): ?>
            <div class="mensaje">
                <?php echo $error; ?>
            </div>
            <?php endif; ?>
            
            <button onclick="registro()" class="form-btn">Registrarse<label ></label></button>
    </div>
	<script>
		function registro(){
			correo = document.getElementById('correo').value;
			usuario = document.getElementById('usuario').value;
			clave = document.getElementById('clave').value;
			clave2 = document.getElementById('clave2').value;
		
			if (correo != "" && usuario !="" && clave != "" && clave2 != "") {
				if(clave == clave2){
				registroAJAX = new XMLHttpRequest();
				variables = "?correo="+correo+"&usuario="+usuario+"&clave="+clave;
				registroAJAX.open('GET','register.php' + variables);
				registroAJAX.send();
				
				registroAJAX.onreadystatechange = function(){
					if (registroAJAX.readyState == 4 && registroAJAX.status == 200) {
				
						datosJSON = JSON.parse(registroAJAX.responseText);
						if (datosJSON.insertado == "si") {
							toastr.success('Usuario creado', 'Correcto!');
						}else if(datosJSON.insertado == "no"){
							
							toastr.error('Usuario duplicado', 'Error!');
						}
					}
				}
				}else{
					toastr.error("Las contraseñas no coinciden","Error!");
				}
			}else{
				toastr.error('Complete todos los campos', 'Error!');
			}
		}
	</script>
  <script src="../js/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
   <script src="../js/script.js"></script>
    </body>
</html>