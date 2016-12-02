<!DOCTYPE html>
<html>
<head>
  <title>PortFolio</title>
  <link rel="stylesheet" href="monCs.css">
</head>
<body>
  <h1 id="monH2">Bienvenue sur ma page de contact</h1>
    <?php
    $flagError = false; //Flag qui indique s'il y a des erreurs (FALSE => Pas d'erreur)
    if( empty($_POST) == false ){ //Vérification d'un envoie de formulaire en method POST
      	//Test du message
      	if( isset($_POST['message']) && strlen($_POST['message']) != 0 ){
          //$message = $_POST['message'];
        } else {
          $flagError = true;
          echo "Message requis". '<br/>';
        }
      	//Test du name
        if( isset($_POST['name']) && strlen($_POST['name']) != 0 ){
          	//Test du name alphabetique
            $name = $_POST['name'];
            $interdits = array(0,1,2,3,4,5,6,7,8,9);
            $nameReplace = str_replace($interdits, "#", $name);
            if($name != $nameReplace){
              	$flagError = true;
                echo "Numérique interdit". '<br/>';
            }
        } else {
          	$flagError = true;
            echo 'Nom requis'. '<br/>';
        }
      	//Test de l'email
        if( isset($_POST['email']) && strlen($_POST['email']) != 0 ){
            $email = $_POST['email'];

            $arCount = substr_count($email, "@");
            $arPos = strpos($email, "@");
            $dotPos = strpos($email, ".", $arPos);
            $emailLen = strlen($email);
          	//Vérif du nombre @
            if($arCount > 1){
              	$flagError = true;
                echo "Trop d'@". '<br/>';
            } elseif($arPos == false){//Vérif de l'existence de l'@
              	$flagError = true;
                echo "Il est où le @". '<br/>';
            } elseif($dotPos == false){//Vérif du . après l'@
              	$flagError = true;
                echo "Il est où le . dans la partie après le @". '<br/>';
            } elseif($arPos+1 == $dotPos || $arPos-1 == $dotPos){//Vérif de la position du .
              	$flagError = true;
                echo "@. et .@ invalide". '<br/>';
            } elseif($emailLen < 7){//Vérif de la taille d'email
              	$flagError = true;
                echo "Trop court". '<br/>';
            }
        } else {
          	$flagError = true;
            echo 'Email requis'. '<br/>';
        }

      	//Test des erreurs, $flagError == False indique qu'il n'y a pas d'erreur
        if($flagError == false){
          $message = $_POST['message'];
    			$message = wordwrap($message, 70, "\r\n");
          $subject = "[Prise de contact] " . $email . " -- " . $name;
          mail('denisbeaufol07@yahoo.fr', $subject, $message);
        }
    }
    ?>
    <div id="monDiv">
      <form action="" method="POST">
        <label for="name">Nom : </label>
        <input type="text" name="name" id="name">
        <label for="email">Email : </label>
        <input type="text" name="email" id="email">
        <br></br>
        <br></br>
        <label for="message">Message : </label>
        <br></br>
        <textarea name="message" id="message"></textarea>
        <br></br>
        <button type="submit" id="monBouton">Envoie</button>
        <br></br>
        <a href='index.html'>Retour</a>
    </div>
</body>
</html>
