<!DOCTYPE html>
<html>
<head>
	<title>Cadastro</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">	
</head>

<body>
	<!-------- NAVBAR ------>
	<header>
		<nav class="navbar navbar-expand-lg  navbar-light bg-light fixed-top">
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
						<a class="nav-link">Cadastro <span class="sr-only">(current)</span></a>
					</li>

				</ul>
			</div>
		</nav>
	</header>


	<!-------------->
	
	<!------ login-------->
	

<div style="margin-top: 10rem;" class="d-flex justify-content-md-center">
		<h1 class="font-weight-light mr-5" ">Login</h1>
		<form action="login.php"  method="post">
			<div class="form-group" >
				<!-------- Nome do cliente ------>
				<label for="exampleInputEmail1">Nome </label>
				<input type="text" class="form-control" name="nm_usuario" id="exampleInputEmail1" aria-describedby="emailHelp" maxlength="40">
				
				

				<!--------  Senha ------------>
				<label for="exampleInputEmail1">Senha</label>
				<input type="password" name="senha" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" data-mask="#">
			</div>
			<button type="submit" class="btn btn-primary mt-4" name="cadastrar" >Logar</button>




	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>