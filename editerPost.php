
<?php
	require_once('session.php');
	$id=$_GET['ID'];
	require_once('connexion.php');
	
	$requete="select * from POST where id=$id";
	$resultat = $con->query($requete);
	$PUBLICATION=$resultat->fetch();
	
	
	
?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Editer un stagiaire</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/monstyle.css">
	</head>
	<body>		
		<div class="container">
			<br>
			
			<div class="panel panel-primary">
				<div class="panel-heading">Editer un POST</div>
				<div class="panel-body">
					<form method="post" action="updatePost.php" class="form" enctype="multipart/form-data">
					
						<div class="form-group">
							<label for="id" class="control-label" >
								Id=<?php echo $PUBLICATION['ID']; ?>
							</label>
							<input type="hidden" name="ID" 
									id="id" class="form-control" 
									value="<?php echo $PUBLICATION['ID']; ?>"/>
						</div>
						
						<div class="form-group">
							<label for="TITLE" class="control-label">Titre</label>
							<input type="text" name="TITLE" id="TITLE" class="form-control"
									value="<?php echo $PUBLICATION['TITLE']; ?>"/>
						</div>
						
						<div class="form-group">
							<label for="CONTENT" class="control-label">Contenue</label>
							<input type="text" name="CONTENT" id="CONTENT" 
							class="form-control"
							value="<?php echo $PUBLICATION['CONTENT'] ?>"/>
						</div>

						<div class="form-group">
							<label for="PHOTO" class="control-label">PHOTO :</label>
							<input type="file" name="PHOTO_POST" id="PHOTO_POST"/>
						</div>
							
						<button type="submit" class="btn btn-primary">Enregistrer</button>
							
					</form>
				</div>
			</div>
			
			
				
		</div>
	</body>
</html>



