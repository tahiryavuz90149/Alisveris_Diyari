<?php

include("baglanti.php");

$urun_id = $_GET["urun_id"];
$kullanici_id = $_GET["kullanici_id"];


$sqlStr = "INSERT INTO sepet(urun_id, kullanici_id) VALUES('$urun_id','$kullanici_id')";

if($baglan -> query($sqlStr) === TRUE){
    echo "<script> alert('Ürününüz başarılı bir şekilde sepetinize eklendi')</script>";
     echo "
         <script>
         window.location.href = 'satici_anasayfa.php';
        </script>";
}else{
    echo "<script> alert('Üzgünüz!!! Ürününüz sepetinize eklenirken bir hata oluştu.')</script>".$baglan->error;
}

?>