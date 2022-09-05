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
    top: 136px;
}
.btnÜrünEkle2{
    position: absolute;
    left: 259px;
    width: 241px;
    top: 298px;
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
          <h1> Eklenecek Olan Kategori Bilgilerini Giriniz</h1>
          <hr style=" width: 814px;  height: 1px;">
        
        </thead>
        <form action="kategori-ekle.php" method="post">
            <tr>
            <td >Ana Kategori Ekle:</td>
            <td> <input type="text" name="kategori" placeholder="Ana Kategori Girin" /></td>
            
            </tr>
            
            <tr>
                <td> <button type="submit" class="btn btnÜrünEkle btn-outline-success">Ana Kategori Ekle</button></td>
            </tr>
        </form>
            <tr>
                <td colspan=3><h4>Alt Kategori Bilgisi Ekle</h6></td>
            </tr>
            
        <form action="kategori-ekle.php" method="post">   
            <tr>
                <td >Ürün Alt Kategorisi:</td>
                <td><input type="text" name="altKategori" placeholder="Alt Kategori" /></td>
                <td >Ürünün Ana Kategorisi:</td>
                <td><input type="text " name="ustKategori" placeholder="Ürün Ana Kategorisi" /></td>
                
            </tr>
            
            <tr>
                <td> <button type="submit" class="btn btnÜrünEkle2 btn-outline-success">Alt Kategori Ekle</button></td>
            </tr>
        </form>
      </table>


    </div>
</body>
</html>

<?php

include("baglanti.php");

if(isset($_POST["kategori"]))  // eğer alan doluysa
{
 
  $Kategori=$_POST["kategori"];
  
$ekle="INSERT INTO kategori(`kategori_adi`, `ust_kategori_id`) VALUES ('".$Kategori."','0')";
   
   if($baglan->query($ekle)===TRUE)
   {
      echo "<script> alert('Kategori bir şekilde eklendi')</script>";
   }else
   {
    echo "<script> alert('Kategori eklenirken bir hata oluştu.')</script>";
   }
}



if(isset($_POST["altKategori"], $_POST["ustKategori"]))  // eğer alan doluysa
{
 
  $AltKategoriAdi=$_POST["altKategori"];
  $UstKategoriAdi=$_POST["ustKategori"];

  $UstKategoriID = $baglan->query ("SELECT kategori_id FROM kategori WHERE kategori_adi = '".$UstKategoriAdi."' ");

  $UstKategoriID = $UstKategoriID->fetch_assoc();
  
   $ekle2="INSERT INTO kategori(`kategori_adi`, `ust_kategori_id`) VALUES ('".$AltKategoriAdi."','".$UstKategoriID['kategori_id']."')";
   
   if($baglan->query($ekle2)===TRUE)
   {
     
      echo "<script> alert('Alt Kategori bir şekilde eklendi')</script>";
   }else
   {
    echo "<script> alert('Alt Kategori eklenirken bir hata oluştu.')</script>";
   }
}

?>