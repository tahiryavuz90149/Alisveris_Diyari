<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../AnaSayfa/CSS/header.css">
    <link rel="stylesheet" href="../AnaSayfa/CSS/üye-giris.css">
    
    <title>Üye Ol</title>
    
</head>
<body>
  <header class="main-header">
        
  
      <img src="../images/logo-tasarimi.png" class="div-logo" >
      <nav class="main-nav">
        <ul class="nav-ul">
            
            <li class="nav-ul-li"><a href="../AnaSayfa/index.php" >AnaSayfa</a></li>
            <li class="nav-ul-li"><a href="../üye-ol/üye-ol.php" >Üye ol/Giriş Yap</a></li>
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
  
  
  <a class="btn btn1 btn-outline-dark" href="üye-ol.php" > Üye Ol</a>
  <br>
  
  <a class="btn btn2 btn-outline-dark" href="giris-yap.php" >Giriş Yap</a>
  
    <form action="üye-ol.php" method="post">
      <div class="card shadow-lg">
        <div class="tablo1 uyeOl" id="tablo-1">
          <table>
            <thead>
              <h1>Bilgilerinizi Giriniz</h1>
              <hr>
            </thead>
            
            <tr>
              <td style="width: 100px; padding: 15px;">Ad :</td>
              <td>
               
                  <input class="input" type="text" name="isim" placeholder="Adiniz" />
                
              </td>
            </tr>
            <tr>
              <td style="width: 100px; padding: 15px;">Soyad :</td>
              <td>
               
                  <input class="input" type="text " name="soyisim" placeholder="Soyadiniz" />
               
              </td>
            </tr>
            <tr>
                <td style="width: 100px; padding: 15px;">E-Posta :</td>
                <td>
                 
                    <input class="input" type="email" name="mail" placeholder="E-Posta adresini girin" />
                  
                </td>
            </tr>

              <tr>
                <td style="width: 100px; padding: 15px;">Şifre :</td>
                <td>
                 
                    <input class = "input" type="password" name="sifre" placeholder="Şifrenizi girin" />
                  
                </td>
              </tr>
            
            
            
            <tr>
              <td> <button type="submit" class="btn  btn-outline-primary"> Kayıt Ol</button></td>

            </tr>
          </table>
        </div>
      

        
      </div>
    </form>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">

    </script>
      
</body>
</html>

<?php

include("../baglanti.php");

if(isset($_POST["isim"], $_POST["soyisim"], $_POST["mail"], $_POST["sifre"],))  // eğer alanlar doluysa
{
  $ad=$_POST["isim"];
  $soyAd=$_POST["soyisim"];
  $email=$_POST["mail"];
  $sifre=$_POST["sifre"];

  $ekle="INSERT INTO kullanici(isim, soyisim, email, sifre)
   VALUES ('".$ad."','".$soyAd."','".$email."','".$sifre."')";
   if($baglan->query($ekle)===TRUE)
   {
      echo "<script> alert('Kaydınız başarılı bir şekilde oluşturuldu')</script>";
   }else
   {
    echo "<script> alert('Kaydınız gönderilirken bir hata oluştu.')</script>";
   }
}

?>