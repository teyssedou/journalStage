<?php

include 'connexion.php';
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css"  href="style.css"/>

<?php

class User
{
    private $id;
    private $titre;
    private $dates;
    private $comment;

    public function __construct($id, $titre, $dates, $comment)
    {
        $this->id = $id;
        $this->titre = $titre;
        $this->dates = $dates;
        $this->comment = $comment;
    }

    public function ajoutBdd()
    {
        try {
            $stmt = Connexion :: prepare('INSERT INTO form (`titre`, `dates`, `comment`) VALUES (:titre, :dates, :comment)');
            $stmt->execute([':titre' => $this->titre, ':dates' => $this->dates, ':comment' => $this->comment]);
            echo 'Ajout de données';
            header('Refresh: 2; url=../index.php');
        } catch (PDOException $e) {
            echo '<b>Nom deja existant</b>';
            header('Refresh: 2; url=../index.php');
            die();
        }
    }

    public static function affiche()
    {
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=exopoo;charset=utf8', 'root', 'simplonco');
        } catch (Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
        $req = $bdd->query('SELECT * FROM form');
        while ($donnee = $req->fetch()) {
            echo "<section id='affiche'>";
            echo '<div><b><u>Titre:</u> </b>'.$donnee['titre'].'</div><br />';
            echo '<div><b><u>Date:</u> </b>'.$donnee['dates'].'</div><br />';
            echo '<b><u>Commentaire:</u> </b>'.$donnee['comment'].'';
            echo'<a href="modif.php/?id='.$donnee['id'].'" ><button>Modifier</button></a>';
            echo '</section><br />';
        }
    }

    public static function recupUserId($userId)
    {
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=exopoo;charset=utf8', 'root', 'simplonco');
        } catch (Exception $e) {
            die('Erreur : '.$e->getMessage());
        }
        $stmt = Connexion :: prepare('SELECT id, titre, dates, comment FROM form WHERE id=:id');
        $stmt->execute([':id' => $userId]);

        while ($donnee = $stmt->fetch()) {
            echo "<form class='modifId' method='POST'>";
            echo '<h2>Modification</h2>';
            echo '
        <div class="form-group row">
            <label for="inputPassword3" class="col-sm-3 col-form-label">Titre:</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" id="inputPassword3" value="'.$donnee['titre'].'" name="titre" placeholder="Titre">
            </div>
        </div>';
            echo '
        <div class="form-group row">
            <label for="inputPassword3" class="col-sm-3 col-form-label">Date:</label>
            <div class="col-sm-3">
                <input type="date" class="form-control" id="inputPassword3" value="'.$donnee['dates'].'" name="dates" placeholder="Date">
            </div>
        </div>';
            echo '
        <div class="form-group row">
            <label for="inputPassword3" class="col-sm-3 col-form-label">Votre commentaire:</label>
            <div class="col-sm-6">
            <input type="text" class="form-control" id="inputPassword3" value="'.$donnee['comment'].'" name="comment">
            </div>
        </div>';
            echo '
        <div class="form-group row">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary" value="'.$donnee['id'].'" name="submit">Modifier</button>
            </div>
        </div>';

            // echo '<input type="text" value="'.$donnee['titre'].'" name="titre">';
            // echo '<input type="date" value="'.$donnee['dates'].'" name="dates">';
            // echo '<input type="text" value="'.$donnee['comment'].'" name="comment">';
            // echo '<button value="'.$donnee['id'].'" type="submit" name="submit">Modifier</button>';
            echo '</form>';
        }
    }

    public function update()
    {
        $stmt = Connexion :: prepare('UPDATE `form` SET titre=:titre, dates=:dates, comment=:comment WHERE id=:id');
        $stmt->execute([':titre' => $this->titre, ':dates' => $this->dates, ':comment' => $this->comment, ':id' => $this->id]);
    }

    public static function supprime($id)
    {
        $stmt = Connexion::getLink()->prepare('DELETE FROM `voiture` WHERE id=:id');
        $stmt->execute([':id' => $id]);
    }
}
