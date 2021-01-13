<?php
  session_start();
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
  <link rel="stylesheet" href="styles.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<title>Wypozyczalnia samochodow</title>
</head>
<body>
  <div id="pasek">
    <?php
      if(isset($_SESSION['Nazwa'])){
        echo '<a href="zarzadzajuzytkownikami.php" class="btn btn-secondary btn-lg">Zarzadzaj uzytkownikami</a> ';
            echo '<a href="zarzadzajpojazdami.php" class="btn btn-secondary btn-lg">Zarzadzaj pojazdami</a>';
            echo '<a href="zarzadzajwypozyczeniami.php" class="btn btn-secondary btn-lg">Zarzadzaj wypozyczniami</a>';
            echo '<a href ="includes/logout.inc.php" class="btn btn-secondary btn-lg"> Wyloguj </a>';
          }
          else
          {
          header("Location: adminlogin.php");
          exit();
          }
          ?>
  </div>