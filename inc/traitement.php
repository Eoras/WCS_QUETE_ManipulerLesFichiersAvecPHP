<?php

if (isset($_POST["content"])) {
    if (!empty($_POST["file"])) {
        $fichier = $_POST["file"];
        $file = fopen($fichier, "w");
        fwrite($file, $_POST["content"]);
        fclose($file);
    }
    header("location: ?f=".$_POST["file"]);
    exit();
}

if (isset($_POST["delete"]) AND !empty($_POST["file"])) {
    $file = ($_POST["file"]);

    if (is_file($file)) {
        if (!unlink($file)) {
            echo "Fichier non supprimer à cause d'une erreur";
        } else {
            echo "Fichier supprimé avec succès";
        }
    } elseif (is_dir($file)) {
        remove($file);
    }
}
