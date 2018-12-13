<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inicio Sesión / Regitro</title>
    
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
                <a href="home.php"><h2>Bienvenido</h2></a>
            </div>
            <div class="menu">
                <a href="../pricipal.php"><li class="module-login active">Inicio Sesión</li></a>
                <a href="register-vista.php"><li class="module-register">Registro</li></a>
            </div>
        </div>
        
        
            <div class="bienvenido"><h1>Bienvenido</h1></div>
            <div class="user line-input">
                <label class="lnr lnr-user"></label>
                <input type="text" placeholder="Correo" name="usuario" id="correo">
            </div>
            <div class="password line-input">
                <label class="lnr lnr-lock"></label>
                <input type="password" placeholder="Contraseña" name="clave" id="clave">
            </div>
            
             <?php if(!empty($error)): ?>
            <div class="mensaje">
                <?php echo $error; ?>
            </div>
            <?php endif; ?>
            
            <button type="submit" class="form-btn" onclick="login()">Entrar<label ></label></button>
            </div>
    <script>
	function login(){
			correo = document.getElementById('correo').value;
			clave = document.getElementById('clave').value;
			if (correo != "" && clave != ""){
				//AQUI VA LA FUNCIONALDIAD
				loginAJAX = new XMLHttpRequest();
				loginAJAX.open('GET','login.php?correo='+correo+'&clave='+clave);
				loginAJAX.send();
				loginAJAX.onreadystatechange = function(){
					if (loginAJAX.readyState == 4 && loginAJAX.status == 200) {
					console.log(loginAJAX.responseText);
						datosJSON = JSON.parse(loginAJAX.responseText);
						if (datosJSON.insertado == "si") {
							location.href ="../principal.php";
						}else if(datosJSON.insertado == "no"){
							
							toastr.error('Correo y/o contraseña invalidas', 'Error!');
						}
					}
				}
			}else{
				alert('Por favor, completa los campos')
			}
		}
	</script>
    <script src="../js/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="../js/script.js"></script>
</body>
</html>