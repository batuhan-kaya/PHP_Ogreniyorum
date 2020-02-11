<?php
include("database.php");

if (isset( $_POST["adisoyadi"] )) {  // Form POST edilmiş...

  if($_POST["tur"] == "" ) {
    // TÜR seçilmemiş :(
    $HataMesaji[] = "Tür seçimi yapılmamış !";
  }

  if($_POST["tc"] == "" ) {
    // tc yazılmamış
    $HataMesaji[] = "tc soyad girilmemiş !";
  }
  if( strlen($_POST["tc"]) > 11 ) {
    // TC 11 karakterden büyük olamaz!
    $HataMesaji[] = "tc 11 karakter olmak zorundadır!";

  }  if( strlen($_POST["tc"]) < 11 ) {
      // TC 11 karakterden küçük olamaz!
      $HataMesaji[] = "tc 11 karakter olmak zorundadır!";
    }

  if($_POST["parola"] == "" ) {
    // Parola yazılmamış
    $HataMesaji[] = "Parola girilmemiş !";
  }

  if($_POST["adisoyadi"] == "" ) {
    // İsim yazılmamış
    $HataMesaji[] = "Ad soyad girilmemiş !";
  }

  if( $_POST["parola"] <> $_POST["parolatekrar"]) {
    // Parola tekrarı aynı değil!
    $HataMesaji[] = "Parola tekrarı aynı değil !";
  }

  if( strlen($_POST["parola"]) < 8 ) {
    // Parola 8 karakterden küçük girilmiş
    $HataMesaji[] = "Parola en az 8 karakter olmalıdır !";
  }

  // Daha önce bu tc ile yapılmış kayıt var mı?
  $SQL = "SELECT * FROM kullanicilar WHERE tc = '{$_POST["tc"]}' ";
  $rows  = mysqli_query($db, $SQL);


  $KayitSayisi = mysqli_num_rows($rows);
  if ($KayitSayisi <> 0) {

    $HataMesaji[] = "Bu Tc ile kullanıcı mevcut! (Bu tc zaten kayıtlı!)";
  }

  if( !isset($HataMesaji) ) {
    // Önce EKLEME için SQL yazıldı.
    $SQL = sprintf("
        INSERT INTO
          kullanicilar
        SET
          tc        = '%s',
          adisoyadi = '%s',
          parola    = '%s',
          tur       = '%s'  ",
    $_POST["tc"], $_POST["adisoyadi"], $_POST["parola"], $_POST["tur"]);

    // SQL komutunu MySQL veritabanı üzerinde çalıştır!
    $rows  = mysqli_query($db, $SQL);

    echo "<h4>Kayıt eklendi...</h4>";
  }
}  // Form POST edilmiş...
?>

<h1>Üye Ekleme</h1>

<h3 style="color:red">
  <?php

    for ($i=0; $i < count($HataMesaji); $i++) {
      echo $HataMesaji[$i] . "<br />";
    }

  ?>
</h3>

<form method="post" autocomplete="off">
  Tc kimlik no:<input required type="number" name="tc" value="<?php echo $_POST["tc"];?>">
  <br /><br />
  Adı Soyadı:<input required type="text" name="adisoyadi" value="<?php echo $_POST["adisoyadi"];?>">
  <br /><br />
  Parola:<input required type="password" name="parola" value="">
  <br /><br />
  Parola Tekrar:<input required type="password" name="parolatekrar" value="">
  <br /><br />
  Tür:<select required name='tur'>
    <option value="">SEÇİNİZ</option>
    <option value="1" <?php if($_POST["tur"]== "Student") echo "selected"; ?>>Öğrenci</option>
    <option value="2" <?php if($_POST["tur"]== "Teacher") echo "selected"; ?>>Öğretim Görevlisi</option>
  </select>
  <br /><br />
  <input type="submit" name="" value="Oluştur">
</form>
<a href="index.php">Giriş Yap</a>
