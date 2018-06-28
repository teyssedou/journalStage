<?php
include 'user.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
    <title>Journal de Stage</title>
  </head>

<body>
<h1>Journal de Stage</h1>
  <form>
    <h2>Contact</h2>
    <div class="form-group row">
    <label for="inputPassword3" class="col-sm-3 col-form-label">Titre:
    </label>
    <div class="col-sm-9">
      <input type="text" class="form-control" id="inputPassword3" name="titre" placeholder="Titre">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-3 col-form-label">Date:</label>
    <div class="col-sm-9">
      <input type="date" class="form-control" id="inputPassword3" name="dates" placeholder="Date">
    </div>
  </div>
  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-3 col-form-label">Votre commentaire:</label>
    <div class="col-sm-9">
      <!-- <input type="text" class="form-control" id="inputPassword3" name="comment" placeholder="Commentaire"> -->
    <textarea name="comment" class="form-control" id="inputPassword3" cols="30" rows="10"placeholder="Commentaire"></textarea>
    </div>
  </div>
   <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary" value="ok" name="submit">Ajouter</button>
    </div>
  </div>
</form>
</body>
</html>

<?php

if (isset($_GET['submit'])) {
    $titre = $_GET['titre'];
    $dates = $_GET['dates'];
    $comment = $_GET['comment'];

    $perso = new User($id, $titre, $dates, $comment);
    $perso->ajoutBdd();
}

echo User::affiche();

// try {
//     $bdd = new PDO('mysql:host=localhost;dbname=exopoo;charset=utf8', 'root', 'simplonco');
// } catch (Exception $e) {
//     die('Erreur : '.$e->getMessage());
// }

// //Recupere les donnees
// $req = $bdd->query('SELECT * FROM form');
// while ($donnee = $req->fetch()) {
//     echo "<div id='".$donnee['id']."'>";
//     echo "La personne avec l'id n°<b>".$donnee['id'].'</b>';
//     echo " s'appelle <b>".$donnee['titre'].'</b><br />';
//     echo 'Elle est née en <b>'.$donnee['dates'].'</b><br /> et a laissé comme commentaire : <b>"'.$donnee['comment'].'"</b>';
//     echo '</div><br />';
// }

//Affichage des données
// class Recup
// {
//     public function affiche()
//     {
//         try {
//             $bdd = new PDO('mysql:host=localhost;dbname=exopoo;charset=utf8', 'root', 'simplonco');
//         } catch (Exception $e) {
//             die('Erreur : '.$e->getMessage());
//         }
//         $req = $bdd->query('SELECT * FROM form');
//         while ($donnee = $req->fetch()) {
//             echo "<div id='affiche'>";
//             echo "La personne avec l'id n°".$donnee['id'];
//             echo " s'appelle <b>".$donnee['titre'].'</b><br />';
//             echo 'Elle est née en <b>'.$donnee['dates'].'</b><br /> et a laissé comme commentaire : <b>'.$donnee['comment'].'</b>';
//             echo '</div><br />';
//         }
//     }
// }
// $perso = new Recup();
// $perso->affiche();

//Envoi de données
// class Insert
// {
//     public function ajoutBdd()
//     {
//         if (isset($_GET['submit'])) {
//             $titre = $_GET['titre'];
//
//             $dates = $_GET['dates'];
//             $comment = $_GET['comment'];
//             try {
//                 $stmt = Connexion :: prepare('INSERT INTO form (`titre`, `dates`, `comment`) VALUES (:titre,  :dates, :comment)');
//                 $stmt->execute([':titre' => $titre, ':dates' => $dates, ':comment' => $comment]);
//             } catch (PDOExeception $e) {
//                 echo 'Error!: '.$e->getMessage().'<br />';
//                 die();
//             }
//             echo 'Ajout de données';
//             header('Refresh: 1; url=../');
//         }
//     }
// }
// $user = new Insert();
// $user->ajoutBdd();

//Envoi des donnees
// if (!empty($_POST['submit'])) {
//     $titre = $_POST['titre'];
//
//     $dates = $_POST['dates'];
//     $comment = $_POST['comment'];
//     try {
//         $stmt = $bdd->prepare('INSERT INTO form (`titre`, `nom`, `dates`, `comment`) VALUES (:titre, :nom, :dates, :comment)');
//         $stmt->execute(array(':titre' => $titre, ':nom' => $nom, ':dates' => $dates, ':comment' => $comment));
//     } catch (PDOExeception $e) {
//         echo 'Error!: '.$e->getMessage().'<br />';
//         die();
//     }
//     echo 'Ajout de données';
//     header('Refresh: 1; url=../');
// }

?>