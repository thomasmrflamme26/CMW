<?php

if(isset($_FILES['img_profil']) AND $_FILES['img_profil']['error'] == 0)
{
	if($_FILES['img_profil']['size'] <= 1000000)
	{
		$chemin = pathinfo($_FILES['img_profil']['name']);
		$extensionFichier = $chemin['extension'];
		$extension_autorisees = array('jpg', 'jpeg', 'png', 'gif', 'bmp', 'ico');
		if(in_array($extensionFichier, $extension_autorisees))
		{
		    $_ImgProfil_->removeImg($_Joueur_['pseudo']);
		    if(!is_dir('utilisateurs/'.$_Joueur_['id']))
		    {
		      	mkdir('utilisateurs/'.$_Joueur_['id']);
		    }
			move_uploaded_file($_FILES['img_profil']['tmp_name'], 'utilisateurs/'.$_Joueur_['id'].'/profil.'.$extensionFichier);
			$_ImgProfil_->defineExt($_Joueur_['pseudo'], $extensionFichier);
			
			header('Location: profil/'.$_Joueur_['pseudo'].'/3');
		}
		else
			header('Location: profil/'.$_Joueur_['pseudo'].'/4');
	}
	else
		header('Location: profil/'.$_Joueur_['pseudo'].'/5');
}
else
	header('Location: profil/'.$_Joueur_['pseudo'].'/6');

?>