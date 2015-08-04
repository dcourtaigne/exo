<?php
include('includes/functions.inc.php');
require('includes/config.php');?>

<section>

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
  if(!empty($_POST['prenom']) && !empty($_POST['nom']) && ($_POST['matiere']!="0")
    && !empty($_POST['jour']) && !empty($_POST['mois']) && !empty($_POST['annees'])
    && !empty($_POST['sexe']) && !empty($_POST['note']) && $_POST['note']<21){

    if (checkdate($_POST['mois'],$_POST['jour'],$_POST['annees'])){


      $nom = utf8_decode($_POST['nom']);
      $prenom = utf8_decode($_POST['prenom']);
      $date = $_POST['annees']."-".$_POST['mois']."-".$_POST['jour'];
      $sexe = $_POST['nom'];
      $matiere = $_POST['matiere'];
      $note = $_POST['note'];
      $sexe = $_POST['sexe'];

      $query1 = "INSERT INTO `eleve`(`id_eleve`, `nom`, `prenom`, `date_naissance`, `sexe`) VALUES
      (NULL,'".$nom."','".$prenom."','".$date."','".$sexe."');";

      //echo $query1; exit();

      if($conn->exec($query1)){
        $last = $conn->lastInsertId();
        //$_SESSION["lastId"]=$last;

        $query2 = "INSERT INTO `note`(`id_note`, `id_eleve`, `id_matiere`, `valeur`) VALUES
        (NULL,'".$last."','".$matiere."','".$note."');";
        echo $query2;

        if($conn->exec($query2)) echo "Enregistrement effectué";
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
  if ($_POST['matiere']="0") $errors .= "<p>Veuiller indiquez une matiere!</p>";
  if (empty($_POST['sexe'])) $errors .= "<p>Veuiller indiquez une note!</p>";


}
?>
