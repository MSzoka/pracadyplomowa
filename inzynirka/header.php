<?php
  session_start();
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<link rel="stylesheet" href="styles.css">
<title>Wypozyczalnia samochodow</title>
</head>
<body>
  <div id="pasek">
    <a href="index.php" class="button1">Strona główna</a>
    <a href="wypożycz.php" class="button1">Wypozycz pojazd</a>
    <a href="#" class="button1">Kontakt</a>
    <a href="Placowki.php" class="button1">Punkty odbioru</a>
    <?php
      if(isset($_SESSION['ID'])){
        echo '<a href ="myaccount.php" class="button1"> Moje konto </a> ';
        echo '<a href ="wypozycznia.php" class="button1"> Moje wypozyczenia </a> ';
        echo '<a href ="includes/logout.inc.php" class="button1"> Wyloguj </a>';
      }
      else
      {
        echo '<a href="Logowanie.php" class="button1">Logowanie</a>
    <a href="Rejestracja.php" class="button1">Rejestracja</a>';
      }
    ?>
  </div>