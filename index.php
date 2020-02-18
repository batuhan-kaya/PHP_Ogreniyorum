<?php
include("database.php");
@session_start();

if(isset($_POST["adisoyadi"])){ // dosyayı çalıştırdığımızda çıkan error message post edilme şartına bağlandı.
$PAROLA = ($_POST["parola"]);

$SQL = "SELECT
          *
        FROM
          kullanicilar
        WHERE
          adisoyadi = '{$_POST["adisoyadi"]}' AND
          parola = '$PAROLA'
        ";
  $rows  = mysqli_query($db, $SQL);

  $KayitSayisi = mysqli_num_rows($rows);
  if ($KayitSayisi == 1) {
    echo "Giriş Başarılı !";
    echo "AnaSayfaya yönlendiriliyorsunuz...";
    header("Refresh:3; url=page1.php");
  } else {
    echo "Kullanıcı adı veya parola hatalı!";
  }
// deneme
}
	require_once("bootstrap.php");
?>
<h1>Kullanıcı Girişi</h1>
<form method="post">
  Adı Soyadı:<input required type="text" name="adisoyadi" value="<?php echo $_POST["adisoyadi"];?>">
  <br /><br />
  Parola:<input required type="password" name="parola" value="<?php echo $_POST["parola"];?>">
  <br /><br />
  <input type="submit" name="" value="Giriş Yap">
</form>

<a href="kullanici_kayit.php">Kayıt Ol</a>
