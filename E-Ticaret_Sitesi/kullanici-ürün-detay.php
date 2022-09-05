<?php

include("baglanti.php");

$urunId = $_GET["id"];

$urun = $baglan->query("SELECT * FROM urun WHERE urun_id = $urunId");

session_start();

$kullaniciAdi = isset($_SESSION["kullaniciAd"]) ? $_SESSION["kullaniciAd"] : "";
$kullaniciId = isset($_SESSION["kullaniciId"]) ? $_SESSION["kullaniciId"] : "";

$urunler = $baglan->query("SELECT * FROM urun "); 
$kategoriler = $baglan->query("SELECT * FROM kategori WHERE ust_kategori_id = 0 ");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="AnaSayfa/CSS/header.css">
    <link rel="stylesheet" href="AnaSayfa/CSS/header.css">
    <title>Ürün Detay</title>
    <style>

    
.tablo{
    
    margin: 15px;
    height: 600px;
    width: 1300px;
    vertical-align: top;
}
.resim{
    width: 700px;
    text-align: center;
}
.acıklama{
    padding: 90px;
}
.acıklama-div{
 
    height: 400px;
    border-radius: 28px;
    width: 500px;
    padding: 10px;
    text-align: inherit;
}
.eklenecekResim{
    width: 473px;
}
.acıklama-div h3{
    left: 876px;
    text-align: center;
    position: absolute;
    top: 423px;
    font-size: 40px;
}
.btn1{
    width: 300px;
    position: absolute;
    left: 820px;
}



    </style>
</head>
<body>

    <header class="main-header">
            
        <img src="images/logo-tasarimi.png" class="div-logo" >
        <nav class="main-nav">
            <ul class="nav-ul">
                
                <li class="nav-ul-li"><a href="satici_anasayfa.php" >AnaSayfa</a></li>
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

    <table class="tablo" >

      <tr>
          <?php
            $row = $urun->fetch_assoc();

            echo '
            <td class="resim"> <img src="'.$row["imagePath"].'" class="eklenecekResim"></td>
            <td class="acıklama">
                <div class="acıklama-div">
               <h1>ürün adı</h1>
                <p>'.$row["urun_aciklama"].'</p>
                <h3>'.$row["fiyati"].' TL </h3> 
              </div>
              <button  class="btn btn1 btn-outline-danger" onclick="location.href=\'sepet-islem.php?urun_id='.$row["urun_id"].'&kullanici_id='.$kullaniciId.'\'"  >Sepete Ekle</button>
    <br>
            </td>';

          ?>
      </tr>




    </table>
</body>
</html>