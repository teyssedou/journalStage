<?php
include 'user.php';
?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="style.css" />
<a href="../index.php">Accueil</a>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    echo User::recupUserId($id);

    if (isset($_POST['submit'])) {
        $titre = $_POST['titre'];
        $dates = $_POST['dates'];
        $comment = $_POST['comment'];

        $perso = new User($id, $titre, $dates, $comment);
        $perso->update();

        header('Refresh: 1; url=../index.php');
    }
} else {
    echo 'Erreur dans la direction';
    header('Refresh: 1; url=../index.php');
}
?>