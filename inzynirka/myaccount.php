<?php
  require "header.php";
  require "includes/config.inc.php";
   if(isset($_SESSION['ID'])){
   $ID = $_SESSION['ID'];
   $wynik=$conn->query("SELECT * From uzytkownicy where ID='$ID'") or die($conn->error());
   if(@count($wynik)==1){
   	$row= $wynik -> fetch_array();
   	$Nazwa = $row['Nazwa'];
   	$Mail = $row['Mail'];
   	$ContactNo = $row['ContactNo'];
   	$Address = $row['Address'];
   	$City = $row ['City'];
   	$Country = $row['Country'];
   }
}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<title>Moje konto</title>
</head>
<body>

	<form action="includes/zmiany.inc.php" method="POST" enctype="multipart/form-data" >
    <div class ="col-xs-1" align="center">
		<br/> <input type="hidden" value="<?php echo $ID?>" name="ID"><br>
		Nazwa: <br/> <input type="text" value="<?php echo $Nazwa?>" class="form-control" name="Nazwa"><br>
		Adres e-mail: <br/> <input type="text" value="<?php echo $Mail?>" class="form-control" name="Mail" ><br>
		Contact no.: <br/> <input type="text" value="<?php echo $ContactNo?>" class="form-control" name="ContactNo" ><br>
		Adres: <br/> <input type="text" value="<?php echo $Address?>" class="form-control" name="Address" ><br>
		Miasto: <br/> <input type="text" value="<?php echo $City?>" class="form-control" name="City" ><br>
		Państwo: <br/> <input type="text" value="<?php echo $Country?>" class="form-control" name="Country"><br>
    Prawo Jazdy przód: <br><input type="file" name="image"><br>
    Prawo Jazdy tył: <br><input type="file" name="image1"><br>
		<button type="submit" class="btn btn-info" name="uzupelnij">Zapisz zmiany</button>
  </div>
		<br>
	</form>
 <?php
 /* $phpFileUploaderors=array(
  0 =>'Plik został pomyślnie załadowany',
  1 => ' Wybrany plik przekracza maksymalny rozmiar pliku',
  2 => ' Wybrany plik przekracza maksymalny rozmiar pliku',
  3 => ' Wybrany plik został tylko w czesci załadowany',
  4 => ' Zaden plik nie zostal załadowany',
  6 => 'Brak folderu tymczasowego',
  7 => 'Blad zapisu pliku na dysku',
  8 => 'Rozszerzenie PHP zatrzymalo ladowanie pliku',
  );
  if(isset($_FILES['userfile'])){
    $file_array=reArrayFiles($_FILES['userfile']);
    for($i=0;$i<count($file_array);$i++){
      if($file_array[$i]['error'])
      {
        ?><div class="alert alert-danger">
          <?php echo $file_array[$i]['name'].' - '.$phpFileUploaderors[$file_array[$i]['error']];
          ?> </div> <?php
      }
      else{
        $extensions = array('jpg','png','jpeg','gif');
        $file_ext = explode('.',$file_array[$i]['name']);
        $name = $file_ext[0];
        $file_ext = end($file_ext);

        if(!in_array($file_ext, $extensions))
        {
          ?><div class="alert alert-danger">
          <?php echo "{$file_array[$i]['name']} - Nieprawidlowy format pliku!";
          ?> </div> <?php
        }
        else{
          $PrawoJazdyP = 'files/'.$file_array[$i]['name'];
          move_uploaded_file($file_array[$i]['tmp_name'], $PrawoJazdyP );
          ?><div class="alert alert-success">
            <?php echo $file_array[$i]['name']. ' - '.$phpFileUploaderors[$file_array[$i]['error']];
            ?></div><?php
        }
      }

    }
  } 

  function reArrayFiles (&$file_post){

  }
 */
?>
</body>
</html>