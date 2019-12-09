<?php session_start(); ?> 
<?php 
include 'com.php';
include 'conexao.php';

$alert="";$senha="";
if (isset($_POST["login"])) {
	$cli="SELECT * FROM usuario WHERE nm_usuario='".trim($_POST["username"])."'";
	$rscli=mysqli_query($condb,$cli);
	$rcli=mysqli_fetch_array($rscli);
	$cd_usuario=$rcli["cd_usuario"];
	$nm_usuario=$rcli["nm_usuario"];
	$senha=$rcli["senha"];
	
	if ($senha!=trim(md5($_POST["password"]))) {
		$alert="<div class='rounded p-3 text-white bg-danger'>
		<i class='pr-3 fas fa-exclamation-triangle float-left' style='font-size: 1.5rem;'></i> 
		Invalid username or password
		</div>";
	}elseif ($senha===trim(md5($_POST["password"]))) {
		$_SESSION["LOGGED"]=$nm_usuario;
		$_SESSION["CODUSER"]=$cd_usuario;
		header('Location: forum.php');
		die;
	}
	mysqli_close($condb);
}
?> 
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">	
</head>
<body>
<!-------- NAVBAR ------>
	<header>
		<nav class="navbar navbar-expand-lg  navbar-light bg-light">
			<a class="navbar-brand" href="#">Forum bacana</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse d-flex justify-content-xl-end" class=""  id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item ">
						<a class="nav-link" href="#">Login <span class="sr-only">(current)</span></a>
					</li>

					<li class="nav-item ">
						<a class="nav-link" href="cadastro.php">Cadastro <span class="sr-only">(current)</span></a>
					</li>

				</ul>
			</div>
		</nav>
	</header>


	<!-------------->




	<div class="container mt-5">
		<?php echo $alert; ?>
		<form method="post">
			<label for="username">Nome de Usuário: </label>
			<input type="text" name="username" id="username" class="form-control">
			<label for="password">Senha: </label>
			<input type="password" name="password" id="password" class="form-control">
			<hr>
			<button type="submit" name="login" class="btn btn-primary">ENTRAR</button>
		</form>
	</div>
</body>
</html>