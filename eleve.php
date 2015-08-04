<?php
include('includes/header.inc.php');
include('includes/functions.inc.php');
require('includes/config.php');?>



<section>
  <form action="" method="POST">
    <label for="nom">Nom: </label>
        <input type="text" id="nom" name="nom" size="30">
      <br>
      <br>

    <label for="prenom">Prénom: </label>
        <input type="text" id="prenom" name="prenom" size="30">
      <br>
      <br>
    <label>Date de naissance</label>

       <select name="jour">
      <?php
        for ($i=1;$i<32;$i++){
          if($i<10){
            echo "<option value='0".$i."'>0$i</option>";
          }else{
            echo "<option value='".$i."'>$i</option>";
          }
        }

        ?>
        </select>
        <select name="mois">
        <?php
          for ($i=1;$i<13;$i++){
            if($i<10){
              echo "<option value='0".$i."'>0".$i."</option>";
            }else{
              echo "<option value='".$i."'>$i</option>";
            }
          }
        ?>
      </select>
      <select name="annees">
        <?php
        $annee = date('Y');
        for ($i = intval($annee); $i >= 1990 ; $i--){
              echo "<option value='".$i."'>$i</option>";
            }
        ?>
      </select>
      <br>
      <br>
    <label >Sexe : </label>
              <input type='radio' name='sexe' value='masculin'> Masculin
              <input type='radio' name='sexe' value='feminin' > Féminin
      <br>
      <br>
    <input type="submit" name="submit" value="Envoyer">

  </form>

</section>

<?php

if (isset($_POST["submit"])){
  //var_dump($_POST); exit();
  //on vérifie si les champs civilité, nom et prénom sont bien remplis
  if(!empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['jour']) && !empty($_POST['mois']) && !empty($_POST['annees']) && !empty($_POST['sexe'])){

    if (checkdate($_POST['mois'],$_POST['jour'],$_POST['annees'])){


      $nom = utf8_decode($_POST['nom']);
      $prenom = utf8_decode($_POST['prenom']);
      $date = $_POST['annees']."-".$_POST['mois']."-".$_POST['jour'];
      $sexe = $_POST['sexe'];

      $query1 = "INSERT INTO `eleve`(`id_eleve`, `nom`, `prenom`, `date_naissance`, `sexe`) VALUES
      (NULL,'".$nom."','".$prenom."','".$date."','".$sexe."');";

      //echo $query1; exit();

      if($conn->exec($query1)){
        $last = $conn->lastInsertId();
        $_SESSION["lastId"]=$last;
       echo "Enregistrement effectué";
      }
    }
  }

  $errors = "";
  if(empty($_POST['prenom'])) $errors .= "<p>Veuiller indiquer le prénom!</p>";
  if (empty($_POST['nom'])) $errors .= "<p>Veuiller indiquez le nom!</p>";
  if(empty($_POST['mois'])) $errors .= "<p>Veuiller indiquez le mois de naissance!</p>";
  if (empty($_POST['jour'])) $errors .= "<p>Veuiller indiquez le mois de naissance!</p>";
  if(empty($_POST['annees'])) $errors .= "<p>Veuiller indiquez l'année de naissance!</p>";
  if (empty($_POST['sexe'])) $errors .= "<p>Veuiller indiquez le sexe!</p>";

}
?>
