<?php 
session_start();

include 'com.php';
include 'conexao.php';

if (!isset($_SESSION["CODUSER"])) {
	$_SESSION["CODUSER"]="";
}

if (isset($_POST["send"])) {
	$uuc="INSERT INTO comentarios (cd_usuario, comentario) VALUES ('".$_SESSION["CODUSER"]."', '".$_POST["comment"]."')";
	if(mysqli_query($condb, $uuc)) {
		header('Location: forum.php');
		die;
	}else {
		echo "<div class='rounded p-3 mb-4 text-white bg-danger'>
		<i class='pr-3 fas fa-exclamation-triangle float-left' style='font-size: 1.5rem;'></i> 
		Server Error, please try again later
		</div>";
		echo $condb->error;
	}
}
if (isset($_POST["RComment"])) {
	$uuc="INSERT INTO resp_comentarios (cd_comentarios, cd_usuario, comentario) VALUES ('".$_POST["RComment"]."', '".$_SESSION["CODUSER"]."', '".$_POST["comentarioe"]."')";
	if(mysqli_query($condb, $uuc)) {
		header('Location: forum.php');
		die;
	}else {
		echo "<div class='rounded p-3 mb-4 text-white bg-danger'>
		<i class='pr-3 fas fa-exclamation-triangle float-left' style='font-size: 1.5rem;'></i> 
		Server Error, please try again later
		</div>";
		echo $condb->error;
	}
	
}
?> 
<!DOCTYPE html>
<html>
<head>
	<title>Forum</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>









<body>
	<!--------navbar------>
	<header>
		<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
			<a class="navbar-brand" href="#">Forum bacana</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse d-flex justify-content-xl-end" class=""  id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="?logout">Sair</a>
					</li>

					<li class="nav-item ">
						<a class="nav-link" href="cadastro.php">Cadastro <span class="sr-only">(current)</span></a>
					</li>
					<!-- <li class="nav-item ">
						<a class="nav-link" href="#">Sair <span class="sr-only">(current)</span></a>
					</li> -->
				</ul> 
			</div>
		</nav>
	</header>
	<!--------------------->



	<div class="jumbotron jumbotron-fluid" style="background-color: #0CE888">
		<div class="container text-white">
			<h1 class="display-4">Forum</h1>
			<p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elitgay.</p>
		</div>
	</div>	

	<div class="container">
		<?php 
		$cmd4="SELECT * FROM comentarios ORDER BY cd_comentarios ASC";
		$result4=$condb->query($cmd4);
		while ($row4=$result4->fetch_assoc()) {
			$codcome=$row4["cd_comentarios"];
			$coduserc=$row4["cd_usuario"];
			$comment=$row4["comentario"];
			$data=$row4["data"];

			$cmd5="SELECT * FROM usuario WHERE cd_usuario='".$coduserc."'";
			$result5=$condb->query($cmd5);
			while ($row5=$result5->fetch_assoc()) {
				$usernamec=$row5["nm_usuario"];
			}

			?> 
		<div class="media">
			<div class="">
				<span class="align-self-start mr-3 img-fluid btn btn-danger">
					<span class="mx-auto my-auto"><?php echo strtoupper($usernamec[0]) ?></span>
				</span>
			</div>
			<div class="media-body">
				<!-- Button trigger modal -->
				<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModalCenter">
					&not;
					<?php echo $codcome; ?>
				</button>
				<span class="mt-0"><span class="lead"><?php echo $usernamec; ?></span> - <?php echo $data; ?></span>
				<p class="lead"><?php echo $comment; ?></p>
			</div>

			<!-- Modal -->
			<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<form method="post" action="#comment" class="modal-content">
						<input type="hidden" name="RComment" value="<?php echo $codcome; ?>">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalCenterTitle">Responder Comentário</h5>
						</div>
						<div class="modal-body">
							<textarea class="form-control reztarea" name="comentarioe" rows="5" placeholder="Comentário" maxlength="255" required></textarea>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
							<button type="submit" class="btn btn-primary" name="RComment">Salvar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<hr class="bg-white">
		<?php 
		$cmd6="SELECT * FROM resp_comentarios WHERE cd_comentarios=$codcome ORDER BY cd_rcomentarios ASC";
		$result6=$condb->query($cmd6);
		while ($row6=$result6->fetch_assoc()) {
			$coduserc=$row6["cd_usuario"];
			$comment=$row6["comentario"];
			$data=$row6["data"];

			$cmd7="SELECT * FROM usuario WHERE cd_usuario='".$coduserc."'";
			$result7=$condb->query($cmd7);
			while ($row7=$result7->fetch_assoc()) {
				$usernamec=$row7["nm_usuario"];
			}

			?> 
		<div class="media ml-5">
			<div class="">
				<span class="align-self-start mr-3 img-fluid btn btn-danger">
					<span class="mx-auto my-auto"><?php echo strtoupper($usernamec[0]) ?></span>
				</span>
			</div>
			<div class="media-body">
				<!-- Button trigger modal -->
				<!-- <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModalCenter">
					&not;
				</button> -->
				<span class="mt-0"><span class="lead"><?php echo $usernamec; ?></span> - <?php echo $data; ?></span>
				<p class="lead"><?php echo $comment; ?></p>
			</div>

			<!-- Modal -->
			<!-- <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<form method="post" action="#comment" class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalCenterTitle">Responder Comentário</h5>
						</div>
						<div class="modal-body">
							<textarea class="form-control reztarea" name="comentarioe" rows="5" placeholder="Comentário" maxlength="255" required></textarea>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
							<button type="submit" class="btn btn-primary" name="RComment" value="<?php echo $codcome; ?>">Salvar</button>
						</div>
					</form>
				</div>
			</div> -->
		</div>
		<hr class="bg-white">
		<?php } ?>
		<?php } ?>
		<?php if ($_SESSION["CODUSER"]!=""): ?>
		<form method="post">
			<div class="ml-5">
				<div>

				</div>
				<div>
					<textarea class="form-control float-right" name="comment"></textarea>
					<button class="btn btn-primary float-right mt-2" type="submit" name="send">Comentar</button>
				</div>
			</div>
		</form>
		<?php else: ?>
			<div class="bg-info">
				<a href="login.php" class="h3 text-white">login</a>
			</div>
		<?php endif ?>
	</div>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>