<!DOCTYPE html>

<head>
  <meta charset="UTF-8">
  <title>Mon premier site dynamique avec PHP</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  </script>
</head>
<body>
  <header>
    <ul>
      <li><a href="eleve.php">Enregistrer un élève</a></li>
      <li><a href="note.php">Enregistrer une note</a></li>
      <li><a href="listeNote.php">Liste des notes</a></li>
      <li><a href="listeNote.php">Liste des notes avec requetes composees</a></li>

    </ul>
    <div>
      <?php echo "nous sommes le".date('d-m-Y',time());?>
    </div>
  </header>
