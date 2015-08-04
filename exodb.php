<?php

function random($car){
 $string = "";
 $chaine = "abcdefghijklmnopqrstvwxyz";
 srand((double)microtime()*1000000);
 for($i = 0; $i < $car; $i++){
   $string .= $chaine[rand()%strlen($chaine)];
 }
 return $string;
}

function randomDate(){
  $anneeActuelle = date('Y');
  $jour = rand(0,31);
  $mois = rand(0,12);
  $annee = rand(1919,$anneeActuelle);

  if (checkdate($mois, $jour, $annee)){
    (($mois < 10)?$mois="0".$mois:$mois);
    (($jour < 10)?$jour="0".$jour:$jour);

    $dateRandom = $annee."-".$mois."-".$jour;
    return $dateRandom;
  }else{
    randomDate();
  }
}

function generateInsertSql($nombre){
  $sql = "INSERT INTO `eleve`(`id_eleve`, `nom`, `prenom`, `date_naissance`, `sexe`) VALUES ";

  for ($i=0; $i <$nombre ; $i++) {
    if($i < $nombre-1){
      $sql .= "(NULL,'".random(10)."','".random(10)."','".randomDate()."','mail@mail.com','bla bla adresse','".randomEtat()."','".randomCodePostal()."'),</br>";
    } else{
      $sql .= "(NULL,'".randomCivilite()."','".random(10)."','".random(10)."','".randomDate()."','mail@mail.com','bla bla adresse','".randomEtat()."','".randomCodePostal()."');</br>";
    }
  }
  return $sql;
}

echo generateInsertSql(10);



INSERT INTO `matiere`(`id_matiere`, `nom`, `desc`) VALUES
(NULL,'Francais','dfgqrfegdqgdsfgsdgqdsdgdfhre'),
(NULL,'Anglais','qdrgdegdfgdfgdfgdssdfgsdfg'),
(NULL,'Mathématiques','dsfbsdfbsdfgsdfg'),
(NULL,'HistoireGeo','dfghnjdhfsfdgsdfgsdfgrthn'),
(NULL,'Science','uolyjkjityhukjytukjyukyukyukyjtyuyu'),
(NULL,'Sport','ryuktyuktyukegrtrgezrgtrhyrh');

