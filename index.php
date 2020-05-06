<?php
	require_once('session.php');
?>

<?php
	
	require_once('connexion.php');

	$requete="select * from POST ";
				
	$resultat=$con->query($requete);


	

	
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Gestion des Filières</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/monstyle.css">
	</head>
	<body>
		
			
		<div class="container">
			<div class="panel panel-success espace60">
				<div class="panel-heading">Rechercher d'un POSTE</div>
				<div class="panel-body">
					<form method="get" action="filieres.php" class="form-inline">
						<div class="form-group">													
							
						<!--	<input type="text" name="motCle" 
									placeholder="Taper un mot clé"
									id="motCle" class="form-control" 
									value="x"/>
							
							<label for="NIVEAU" class="control-label">Niveau</label>
							<select name="NIVEAU" id="NIVEAU" class="form-control"
									onChange="this.form.submit();">
								<option value="all">Tous les niveaux</option>
								<option value="q">Qualification</option>
								<option value="t">Technicien</option>
								<option value="ts">Technicien Spécialisé</option>
								<option value="l">Licence</option>
								<option value="m">Master</option>
							</select>

							<button type="submit" class="btn btn-success">
								<i class="glyphicon glyphicon-search"></i>
								Chercher...
							</button>

					     	-->
							
							&nbsp&nbsp&nbsp
							<?php if($_SESSION['utilisateur']['ROLE']=="ADMIN") {?>
								<a href="nouvelleFiliere.php">Nouvelle POST</a>
							<?php } ?>	
						</div>
							
					</form>
				</div>
			</div>
			<div class="panel panel-primary ">
				<div class="panel-heading">Liste des POST (&nbsp Filière) </div>
				<div class="panel-body">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>ID</th>
									<th>TITLE</th>
									<th>CONTENT</th>
									<th>PHOTO</th>								
								 <?php if($_SESSION['utilisateur']['ROLE']=="ADMIN") {?> 
									<th>ACTIONS</th>
								<?php } ?>
							</tr>
						</thead>
						<tbody>
							<?php while($PUBLICATION=$resultat->fetch()){?>
									<tr>
										<td><?php echo $PUBLICATION['ID'] ?></td>
										<td><?php echo $PUBLICATION['TITLE'] ?></td>
										<td><?php echo $PUBLICATION['CONTENT'] ?></td>
										<td>
											<img src="../images/<?php echo $PUBLICATION['PHOTO_POST']?>" 
												class="img-thumbnail"  width="50" height="40" >
										</td>	
										<td>
										    <?php if($_SESSION['utilisateur']['ROLE']=="ADMIN") {?>
												<!--  Action Editer un stagiaire -->
											<a href="editerPost.php?ID=<?php echo $PUBLICATION['ID'] ?>">
													<span class="glyphicon glyphicon-pencil"></span>
												</a>
												
												&nbsp &nbsp
												<!--  Action Supprimer un stagiaire -->
												<a Onclick="return confirm('Etes vous sur de vouloir supprimer le STAGIAIRE?')" 
													href="supprimerpost.php?ID=<?php echo $PUBLICATION['ID'] ?>">
													<span class="glyphicon glyphicon-trash"></span>
												</a>
																							
											<?php } ?>
											
										</td>
									</tr>
								<?php } ?>
						
						</tbody>
					</table>
					<div>
				    </div>
					
				</div>				
			</div>	
			
		</div>
	</body>
</html>