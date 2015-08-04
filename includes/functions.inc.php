<?php

function selectMatiere($conn){
   $query = "SELECT * FROM `matiere`";
   $statement = $conn->query($query);

   while ($row = $statement->fetch()){

    $matiere = utf8_encode($row['nom']);
    $idMatiere = $row['id_matiere'];

    echo "<option value='".$idMatiere."'>".$matiere."</option>";

   }

}

function ListEleve($conn){
  $query = "SELECT * FROM `eleve`";
  $statement = $conn->query($query);

  while ($row = $statement->fetch()){

  $nom = utf8_encode($row['nom']);
  $prenom = utf8_encode($row['prenom']);
  $idEleve = $row['id_eleve'];

  echo "<option value='".$idEleve."'>".$nom.",".$prenom."</option>";

   }

}


function listMatiere($conn){
   $query = "SELECT * FROM `matiere`";
   $statement = $conn->query($query);

   while ($row = $statement->fetch()){

    $matiere = utf8_encode($row['nom']);
    $idMatiere = $row['id_matiere'];

    echo "<th>".$matiere."</th>";
   }
}


function getEleveNotes($conn){
  $result = "<tr>";
  $queryEleve = "SELECT * FROM `eleve`";
  $statement = $conn->query($queryEleve);

  while ($row = $statement->fetch()){

    $result .= "<td>".$row['nom']."</td><td>".$row['prenom']."</td>";

    $queryNote = "SELECT * FROM `note` WHERE `id_eleve`=".$row['id_eleve']." ORDER BY `id_matiere` ASC";
    $statement_note = $conn->query($queryNote);
   // var_dump($statement_note); exit();
    $notes = $statement_note->fetchAll();

    foreach($notes as $note){
      $result .= "<td>".$note["valeur"]."</td>";
    }
    $result .= "</tr>";
  }
  $result .= "</tr>";
  echo $result;

  /*$sql = "SELECT * FROM eleve";
        $statement = $conn->query($sql);

        while($row = $statement->fetch()){
          echo "<tr>
          <td>".$row["nom"]."</td>
          <td>".$row["prenom"]."</td>";
            $sql = "SELECT * from note where id_eleve=".$row['id_eleve']." ORDER BY id_matiere ASC";
            $statement_1 = $conn->query($sql);
            var_dump($statement_1); exit();
            $notes = $statement_1->fetchAll();
            foreach ($notes as $note){
              echo "<td>".$note["valeur"]."</td>" ;
               }
          echo "</tr>";


        }*/
}
