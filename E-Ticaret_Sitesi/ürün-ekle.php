<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="AnaSayfa/CSS/header.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Urun Ekle</title>
    <style>

body{
    background-color: aliceblue;
}
.resim-div{
    margin: 103px 0px 0px 10px;
    height: 500px;
    width: 500px;
    border: 2px solid #888;
    border-radius: 10px;
    background-color: white;
    text-align: center;
    display: inline-block;
}


.yazi p{
    position: absolute;
    top: 100px;
    left: 220px;
    display: none;
}

.eklenecekResim{
    position: absolute;
    top: 106px;
    left: 13px;
    width: 494px;
    border: 6px outset;
    height: 494px;
    border-radius: 266px;

}
.formlar{
    margin: 75px 25px 0px 0px;
    float: right;
    height: 550px;
    width: 800px;
    border-radius: 10px;
    position: relative;
    text-align: center;
}
table{
    text-align: left;
    margin-left: 5px;
}
table td{
    padding: 14px;
    padding-left: 0px;
}

.input-aciklama{
    margin-top: -22px;
    height: 150px;
    width: 756px;
    text-align: left;
    font-family: 'Times New Roman', Times, serif;
    font-size: 16px;
}
.btnÜrünEkle{
    position: absolute;
    left: 259px;
    width: 241px;
}

    </style>
</head>
<body>
    
    <header class="main-header">
            
        <img src="images/logo-tasarimi.png" class="div-logo" >
        <nav class="main-nav">
            <ul class="nav-ul">
                
                    <li class="nav-ul-li"><a href="yönetici_anasayfa.php" >AnaSayfa</a></li>
                    <li style="display:inline-block;">
                        <div class="search">
                            <form name="aramakutusu" class="search" method="post">
                                <input type="text" name="arama" class= "search" aria-placeholder="Arama">
                                <i class="fa-solid fa-magnifying-glass" id="icon-search"></i>

                            </form>
                        </div>
                    
                    </li> 
                
            </ul>    

        </nav>
    </header>

    <div class="resim-div">

        <div class="yazi"> 
            <img src="images/logo-tasarimi.png" class="eklenecekResim">
        </div>

    </div>

    <div class="formlar">

        <table>
        <thead>
          <h1> Ürün Bilgilerini Giriniz</h1>
          <hr style=" width: 814px;  height: 1px;">
        
        </thead>
        <form action="ürün-ekle.php" method="post">
        <tr>
          <td >Ürün Adı :</td>
          <td> <input type="text" name="urunAdi" placeholder="Ürün Adı" /></td>
          <td >Ürünün Kategorisi :</td>
          <td><input type="text " name="urunKategori" placeholder="Ürün Kategorisi" /></td>
          
        </tr>
        
        
        <tr>
            <td >Ürün Fiyatı :</td>
            <td><input type="number" name="urunFiyati" placeholder="Fiyat" /></td>
            <td >Ürünün Üst Kategorisi:</td>
            <td><input type="text " name="urunUstKategori" placeholder="Ürün Üst Kategorisi" /></td>
            
        </tr>

        <tr>
            <td >Ürünün Adet Bilgisi :</td>
            <td><input type="number" name="urunStok" placeholder="Adet" /></td>
            <td >Ürün Resminin Adresi :</td>
            <td><input type="text" name="urunUrl" placeholder="Url" /></td>
        </tr>
       

        <tr> 
            <td colspan="4"  style="text-align: left;">  Bu ürünün özelliklerini ve açıklamasını detaylı bir şekilde yazınız. </td>
        </tr>
        <tr> 
            <td colspan="4" ><textarea  class="input-aciklama" name="urunAciklama" placeholder="Ürünün özelliklerini ve açıklamasını yapınız" ></textarea></td>
        </tr>
          
        <tr>
            <td> <button type="submit" class="btn btnÜrünEkle btn-outline-success"> Ürün Ekle</button></td>
        </tr>
        </form>
      </table>


    </div>
</body>
</html>

<?php

include("baglanti.php");

if(isset($_POST["urunKategori"], $_POST["urunUstKategori"], $_POST["urunFiyati"],$_POST["urunAdi"], $_POST["urunStok"], $_POST["urunUrl"], $_POST["urunAciklama"]))  // eğer alanlar doluysa
{
 
  $kategori=$_POST["urunKategori"];
  $ustKategori=$_POST["urunUstKategori"];
  $fiyat=$_POST["urunFiyati"];
  $ad=$_POST["urunAdi"];
  $stok=$_POST["urunStok"];
  $url=$_POST["urunUrl"];
  $aciklama=$_POST["urunAciklama"];

  $ekle="INSERT INTO urun(kategori, ust_kategori, urun_adi, fiyati, stok, imagePath, urun_aciklama)
 VALUES ('".$kategori."','".$ustKategori."','".$ad."','".$fiyat."','".$stok."','".$url."','".$aciklama."')";
   
   if($baglan->query($ekle)===TRUE)
   {
      echo "<script> alert('Ürün basarılı bir şekilde gönderildi')</script>";
   }else
   {
    echo "<script> alert('Ürün gönderilirken bir hata oluştu.')</script>";
   }
}

?>
