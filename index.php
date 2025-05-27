<?php ob_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>EXO 1</h2>
    <?php 
    if (!empty($_GET["ville"]) && !empty($_GET["transport"])){
        echo "La ville choisie est " . $_GET["ville"]  . "et le voyage se fera en " . $_GET["transport"] . "!";
        }?>
    
    <!-- http://localhost:8080/phpform/index.php?ville=Perigueux&transport=Voiture -->

    <h2>EXO 2</h2>
    <p>Quel est ton animal préféré ?</p>
    <form action="index.php" method="get">
        <input type="text" name="animal">
        <button>Valider</button>
        </form>
    <?php 
        if (!empty($_GET['animal'])) {
        echo "Votre animal choisi est : " . $_GET['animal'];
    }
     ?>

    <h2>EXO 3</h2>
    <form action="index.php" method="post">
        <input type="text" name="pseudo">
        <input type="color" name="color">
        <button>Valider</button>
        </form>
    <?php if (!empty($_POST['username'])){
        echo 'votre nom d\'utilisateur : ' . $_POST['username'];
    }
    ?>
     <style> <?php echo "body { background-color: " . $_POST['color'] . ";}" ?> </style>

    <h2>EXO 4</h2>
    <form action="index.php" method="post">
        <input type="number" name="nombre">
        <button>Valider</button>
        </form>

    <?php 
    if(!empty($_POST['nombre'])) {
        $nombre = $_POST['nombre'];
        if ($nombre % 6 === 0){
            echo "Le chiffre obtenu est " . rand(1, $nombre);
        } else {
            echo $_GET['error'];
        }
    }
    ?>
    
    <h2>EXO 5</h2>
    <form action="index.php" method="post">
        <input type="text" name="pseudo">
        <input type="password" name="mdp">
        <button>Valider</button>
        </form>
        <?php 
        if(!empty($_POST['pseudo']) && !empty($_POST['mdp'])) {
            $pseudo = $_POST['pseudo'];
            $mdp = $_POST['mdp'];
            if ($pseudo == "admin" && $mdp == 1234){
                header("Location: http://localhost:8080/phpform/index2.php");
            } else {
                
                echo "erreur";
            };
        }
        ?>

    <h2>EXO 6</h2>
    <form action="index.php" method="get">
        <input type="number" name="number1">
        <select name="operateur">
            <option value="">--Choisir un opérateur--</option>
            <option value="+" name="+">additionner</option>
            <option value="-" name="-">soustraire</option>
            <option value="*" name="*">Multiplier</option>
            <option value="/" name="/">Diviser</option>
        </select>
        <input type="number" name="number2">
        <button>Valider</button>
    </form>
    <?php 
    if(!empty($_GET['number1']) && $_GET['number2']) {
    function calcule($number1, $number2, $operateur) {
        $number1 = $_GET['number1'];
        $number2 = $_GET['number2'];
        $operateur = $_GET['operateur'];
            if($operateur === '+') {
                $resultat = $number1 + $number2;
            } else if($operateur === '-') {
                $resultat = $number1 - $number2;
            } else if($operateur === '/') {
                if($number2 != 0){
                $resultat = $number1 / $number2;
                }    else echo "On ne peut pas diviser par 0";
            } else if($operateur === '*') {
                $resultat = $number1 * $number2;
            }
        return $resultat;
    }

    echo "le résultat est : " . calcule($_GET['number1'], $_GET['operateur'], $_GET['number2']);
}
    ?>

    <h2>EXO 7</h2>
    <form action="index.php" method="post">
        <input type="number" name="number">
        <select name="operateur">
            <option value="">--Choisir une monnaie--</option>
            <option value="Dollars">Dollars</option>
            <option value="peso">pessos</option>
        </select>
        <button>Valider</button>
    <?php 
    if(!empty($_POST['number']) && $_POST['operateur']) {
        function convertion($euro, $monnaie) {
        $euro = $_POST['number'];
        $operateur = $_POST['operateur'];
            if($operateur === 'Dollars'){
                $convertie = $euro * 1.13 . "Dollars";
            } else if ($operateur === 'peso') {
                $convertie = $euro * 21.93 . "Pesos";
            }
        return $_POST['number'] ."euro correspond à". $convertie;
        }
        echo convertion($_POST['number'], $_POST['operateur']);
    }
    ?>

    <h2>EXO 8</h2>
    <form action="index.php" method="post">
    <div>
        <p> 2+2 =</p>
    <input type="radio" id="1" name="chiffre" value="1" />
    <label for="1">1</label>

    <input type="radio" id="2" name="chiffre" value="2" />
    <label for="2">2</label>

    <input type="radio" id="3" name="chiffre" value="3" />
    <label for="3">3</label>

    <input type="radio" id="4" name="chiffre" value="4" />
    <label for="4">4</label>
  </div>
  <div>
        <p>complète le proverbe suivant : Mettre la charrue avant</p>
    <input type="radio" id="5" name="phrase" value="5" />
    <label for="5">les boeufs</label>

    <input type="radio" id="6" name="phrase" value="6" />
    <label for="6">les chats</label>

    <input type="radio" id="7" name="phrase" value="7" />
    <label for="7">les devs</label>

    <input type="radio" id="8" name="phrase" value="8" />
    <label for="8">la lune</label>
  </div>
  <div>
        <p>Quel est la capitale du Mexique ?</p>
    <input type="radio" id="9" name="capital" value="9" />
    <label for="9">Paris</label>

    <input type="radio" id="10" name="capital" value="10" />
    <label for="10">Tokyo</label>

    <input type="radio" id="11" name="capital" value="11" />
    <label for="11">Mexico</label>

    <input type="radio" id="12" name="capital" value="12" />
    <label for="12">Londres</label>
  </div>
  <button>Valider</button><br>
  <?php 
  if(!empty($_POST['chiffre']) || !empty($_POST['phrase']) || !empty($_POST['capital'])) {
   if($_POST['chiffre'] != 4) {
        echo "La question 1 est fausse <br>";
   } else
        echo "La question 1 est bonne <br>";

   if($_POST['phrase'] != 5) {
        echo "La question 2 est fausse <br>";
   } else
        echo "La question 2 est bonne <br>";

   if($_POST['capital'] != 11) {
        echo "La question 3 est fausse";
   } else
        echo "La question 3 est bonne";
}
  ?>

  <h2>EXO 9</h2>
  <form action="index.php" method="POST">
    <p>Essaye de deviné un nombre entre 0 et 1000 :</p>
    <input type="number" name="number" id="number">
    <button>Valider</button>

    <?php 
    session_start();
        if(!isset($_SESSION['random_number'])) {
            $_SESSION['random_number'] = rand(0, 1000);
        }
    $number = $_SESSION['random_number'];

    if(!empty($_POST['number'])) {
        if($_POST['number'] < $number) {
            echo "Le nombre que vous proposez est trop petit";
        } else if ($_POST['number'] > $number) {
            echo "Le nombre que vous proposez est trop grand";
        } else {
            echo " bien joué le nombre qu'il fallait trouver était bien " . $number;
            unset($_SESSION['random_number']);
        }
    }
    ?>
  </form>

  <h2>EXO 10</h2>
        <form action="index.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="image" accept="image/*" required>
            <button type="submit">Envoyer</button>
        </form>
        <?php
    if (isset($_FILES["image"])) {
        $targetFile = basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            echo "C'est bien une image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "Ce n'est pas une image.";
            $uploadOk = 0;
        }
    }
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif") {
            echo " Seulement les formats : JPG, JPEG, PNG & GIF sont acceptés.";
            $uploadOk = 0;
        }
?>
</body>
</html>