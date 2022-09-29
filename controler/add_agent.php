<?php
   include 'config.php';
   if(isset($_POST['Add'])){
        $nom = $_POST['nom'];
        $postnom = $_POST['postnom'];
        $prenom = $_POST['prenom'];
        $matricule = $_POST['matricule'];
        $genre = $_POST['genre'];
        $last = latid();
        $query = "INSERT INTO `agents` (`id`, `fnger_id`, `nom`, `postnom`, `prenom`, `genre`, `matricule`, `start_date`, `dellet`, `add_state`) VALUES (NULL, '$last', '$nom', '$postnom', '$prenom', '$genre', '$matricule', current_timestamp(), '0', '1');";
        $result = $conn->query($query);
    } 
    function latid()
    {
        include 'config.php';
        $qrt = "SELECT MAX(fnger_id)+1 AS last_id FROM `agents`";
        $result = $conn->query($qrt);
        $row = $result->fetch_Assoc();
        
        if ($row['last_id'] == NULL) {
            return 1;
        }
        return $row['last_id'];
    }
?>