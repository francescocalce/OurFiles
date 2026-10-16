<!-- CONFIGURAZIONE DEL DATABASE    -->
<?php include("php/config.php"); ?>

<!------ tag per il login ---------->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>

<style>
@viewport {
	zoom: 1.0;
	width: extend-to-zoom;
}

@-ms-viewport{
	width: extend-to-zoom;
	zoom: 1.0;
}
</style>

<html lang="it">

<head> <title>Our Files</title>

<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="icon" href="img/logo.jpg">
	<!--Css per il login-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" 
integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css/login.css">

</head>

<body style="background-color:#7671de;">
<br><br>
	<div style="text-align: center">
		<img src="img/Hosting.png" alt="Logo">
	  </div>


	  <div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Accedi:
				</h3>
				
			</div>
			<div class="card-body">

				<form action="php/login.php" method="post">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" name="username" placeholder="username">
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" name="password" placeholder="password">
					</div>
					
					<div class="form-group">
					<input type="submit" value="Login" class="btn float-right login_btn" name="login">
					</div>
				</form>

			</div>
		</div>
	</div>
</div>

</body>

</html>