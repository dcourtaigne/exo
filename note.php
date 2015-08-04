<?php
include('includes/functions.inc.php');
include('includes/header.inc.php');
require('includes/config.php');?>



<section>
  <form action="" method="POST">
    <label>Eleve: </label>
      <Select name="eleve">
      <option value='0'>Choisissez</option>
      <?php ListEleve($conn)?>
      </select>

      <br>
      <br>
    <label> Matière:</label>
    <Select name="matiere">
      <option value='0'>Choisissez</option>
      <?php selectMatiere($conn)?>
    </select>
    <br>
    <br>
   <label for="note">Note obtenue: </label>
      <input type="text" id="note" name="note" size="10">
    <br>
    <br>
    <input type="submit" name="submit" value="Envoyer">

  </form>

</section>

<?php

if (isset($_POST["submit"])){
  //var_dump($_POST); exit();
  //on vérifie si les champs civilité, nom et prénom sont bien remplis
  if(($_POST['matiere']!="0") && !empty($_POST['note']) && $_POST['note']<21){


      $idEleve = $_POST['eleve'];
      $matiere = $_POST['matiere'];
      $note = $_POST['note'];
      $query2 = "INSERT INTO `note`(`id_note`, `id_eleve`, `id_matiere`, `valeur`) VALUES
       (NULL,'".$idEleve."','".$matiere."','".$note."');";

      if($conn->exec($query2)){
        echo "Enregistrement effectué";
      }

  }

  $errors = "";
  if(empty($_POST['prenom'])) $errors .= "<p>Veuiller indiquer le prénom!</p>";
  if (empty($_POST['nom'])) $errors .= "<p>Veuiller indiquez le nom!</p>";
  if(empty($_POST['mois'])) $errors .= "<p>Veuiller indiquez le mois de naissance!</p>";
  if (empty($_POST['jour'])) $errors .= "<p>Veuiller indiquez le mois de naissance!</p>";
  if(empty($_POST['annees'])) $errors .= "<p>Veuiller indiquez l'année de naissance!</p>";
  if (empty($_POST['sexe'])) $errors .= "<p>Veuiller indiquez le sexe!</p>";
  if ($_POST['matiere']="0") $errors .= "<p>Veuiller indiquez une matiere!</p>";
  if (empty($_POST['sexe'])) $errors .= "<p>Veuiller indiquez une note!</p>";


}
?>
