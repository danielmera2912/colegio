<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Aplicación</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?=URL?>public/assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?=URL?>public/assets/css/app.css">
    <link rel="stylesheet" href="<?=URL?>public/assets/css/pages/auth.css">
     <link rel="stylesheet" href="<?=URL?>public/lobibox/LobiBox.min.css">
    <link rel="icon" href="<?=URL?>public/assets/images/favicon.png">
</head>
<body>
	<div id="auth">
        
		<div class="row h-100">
		    <div class="col-lg-5 col-12">
		        <div id="auth-left">
		            <h1 class="auth-title">Log in.</h1>
		            <form action="index.php?page=login" method="post">
		                <div class="form-group position-relative has-icon-left mb-4">
		                    <input type="text" class="form-control form-control-xl" placeholder="Username" name="textousername">
							
		                </div>
		                <div class="form-group position-relative has-icon-left mb-4">
		                    <input type="password" class="form-control form-control-xl" placeholder="Password" name="textoclave">
		                	
						</div>
		                <input type="submit" value="Entrar" name="botonlogin">
		            </form>
		        </div>
		    </div>
		    <div class="col-lg-7 d-none d-lg-block">
		        <div id="auth-right">

		        </div>
		    </div>
		</div>

    </div>
    <script>
    	var base_url = "<?php echo URL; ?>";
    </script>
	<script src="<?=URL?>public/assets/vendors/jquery/jquery.min.js"></script>
	<script src="<?=URL?>public/lobibox/lobibox.min.js"></script>
	<script src="<?=URL?>public/js/login.js"></script>
</body>
</html>