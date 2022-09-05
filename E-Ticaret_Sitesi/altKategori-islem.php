<?php

include("baglanti.php");
$anaKategoriler = $baglan->query("SELECT * FROM kategori WHERE ust_kategori_id = 0 ");

if(isset($_POST["kategori"], $_POST["altKategori"], $_POST["ustKategori"]))  // eğer alanlar doluysa
{
 
  $kategori=$_POST["kategori"];
  $altKategori=$_POST["altKategori"];
  $ustKategori=$_POST["ustKategori"];
  
$ekle="INSERT INTO kategori(kategori_adi, ust_kategori_id, `path`) VALUES ('".$kategori."','0','".$kategori.".php')";

   
   if($baglan->query($ekle)===TRUE)
   {
      echo "<script> alert('Kategori bir şekilde eklendi')</script>";
   }else
   {
    echo "<script> alert('Kategori eklenirken bir hata oluştu.')</script>";
   }
}

?>
