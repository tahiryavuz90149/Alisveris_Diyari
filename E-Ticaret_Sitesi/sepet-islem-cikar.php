<?php

include("baglanti.php");

$urun_id = $_GET["urun_id"];
$kullanici_id = $_GET["kullanici_id"];


// $sqlStr = "INSERT INTO sepet(urun_id, kullanici_id) VALUES('$urun_id','$kullanici_id')";

$sqlStr = "DELETE FROM `sepet` WHERE kullanici_id ='".$kullanici_id."' && urun_id ='".$urun_id."'";

if($baglan -> query($sqlStr) === TRUE){
    echo "<script> alert('Ürününüz başarılı bir şekilde sepetinizden çıkarıldı')</script>";
     echo "
         <script>
         window.location.href = 'satici_anasayfa.php';
        </script>";
}else{
    echo "<script> alert('Üzgünüz!!! Ürününüz sepetinizden çıkartılırken bir hata oluştu.')</script>".$baglan->error;
}

?>