<?php
	require_once('session.php');
?>

<?php
	require_once('connexion.php');
	
	$id=$_POST['ID'];
	$nom=$_POST['TITLE'];
	$contenue=$_POST['CONTENT'];

		//Récuperer le Nom de la photo envoyée
	$nomPhoto= $_FILES['PHOTO_POST']['name'];	
	
		//Récuperer le Nom du fichier image temporaire sur le serveur
	$imageTmp=$_FILES['PHOTO_POST']['tmp_name'];
	
		//Déplacer le fichier temporaire vers le dossier images de mon application
	move_uploaded_file($imageTmp,'/images/'.$nomPhoto);
			
	if(!empty($nomPhoto)){ // empty($nomPhoto):$nomPhoto est vide (Photo non envoyée)
						  // !empty($nomPhoto):$nomPhoto non vide (Photo envoyée)
		
		$requete="UPDATE POST SET TITLE=?,CONTENT=?,PHOTO_POST=? where ID=?";
		
		$param=array($nom,$contenue,$nomPhoto,$id);		
	}
	else{ // Photo non envoyée
		$requete="UPDATE POST SET TITLE=?,CONTENT=? where id=?";
				
		$param=array($nom,$contenue,$id);		
	}
			
	$resultat = $con->prepare($requete);	
	$resultat->execute($param);	
	
	header("location:index.php");

?>