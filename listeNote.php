<?php
include('includes/header.inc.php');
include('includes/functions.inc.php');
require('includes/config.php');?>


<table>
  <thead>
    <tr>
      <th>Nom</th>
      <th>Prenom</th>
        <?php
           // construire la suite de l'entete du tableau html en veillant à afficher exactement les matieres qui  existent dans votre table matieres
        listMatiere($conn)
        ?>
    </tr>
  </thead>
  <tbody>
     <?php getEleveNotes($conn) ?>

  </tbody>



</table>
