<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="AnaSayfa/CSS/header.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Urun Sil </title>
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
.resim-div:hover .yazi p{
    display: block;

}
.resim-div:hover{
    background-color: antiquewhite;
}
.yazi p{
    position: absolute;
    top: 100px;
    left: 220px;
    display: none;
}
.baslık{
    position: inherit;
    left: -236px;
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
    margin-left: -244px;
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
.btnÜrünSil{
    position: absolute;
    left: 154px;
    top: 111px;
    width: 242px;
}

    </style>
</head>
<body>
    
    <header class="main-header">
        
        <!-- <a href="#" class="logo" style="text-decoration: none;">Alışveriş Diyarı</a> -->
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



    <div class="formlar">

        <table>
            <thead>
                <h1 class="baslık">  Silinecek olan Ürünün İsmini Giriniz <br><br></h1>
                
            </thead>
                <form action="ürün-sil.php" method="post">
                    <tr>
                        <td >Ürün Adı :</td>
                        <td> <input type="text" name="urunAdi" placeholder="Ürün Adı" /></td>
                    
                    </tr>
                
                        <td> <button type="submit" class="btn btnÜrünSil btn-outline-success"> Ürünü sil</button></td>
                    </tr>
                </form>
      </table>


    </div>
</body>
</html>

<?php

include("baglanti.php");

if(isset($_POST["urunAdi"]))  // eğer urunAdi doluysa
{
  $ad=$_POST["urunAdi"];
   
   $sil ="DELETE FROM urun WHERE urun_adi ='".$ad."'";
   if($baglan->query($sil)===TRUE)
   {
      echo "<script> alert('Ürün basarılı bir şekilde silindi')</script>";
   }else
   {
    echo "<script> alert('Ürün silinirken bir hata oluştu.')</script>";
   }
}

?>