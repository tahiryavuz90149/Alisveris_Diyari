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
    
    <title>Giriş Yap</title>
    
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
  
    <div class="card shadow-lg">
      

      
        <div class="tablo2 girişYap" id="tablo-2">
          <table>
              <thead>
                <h1> Giriş Bilgileriniz</h1>
                <hr>
              </thead>
              
              
            <form action="" method="post"> 
              <tr>
                  <td style="width: 100px; padding: 15px;">E-Posta :</td>
                  <td>
                   
                      <input class = "input" type="email" name="mail"placeholder="E-Posta adresini girin"/>
                    
                  </td>
                </tr>
                
                
                <tr>
                  <td style="width: 100px; padding: 15px;">Şifre :</td>
                  <td>
                   
                      <input class = "input" type="password" name="sifre" placeholder="Şifrenizi girin" />
                    
                  </td>
                </tr>
              
              
              
              <tr><td> <button type="submit" class="btn btnGiris btn-outline-primary"> Giriş Yap</button></td></tr>
            </form>
          
          </table>
        </div> 

        
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">

    </script>
      
</body>
</html>

<?php

include("../baglanti.php");

if($_POST)
{
  $mail = $_POST["mail"];
  $sifre = $_POST["sifre"];

  $sorgu = $baglan->query("Select * from kullanici where(email='$mail'&& sifre = '$sifre')");
  $kayitsay= $sorgu->num_rows; // yukarıdaki bilgilerle eşleşen kayıtları sayar


  if($kayitsay > 0)
  {
    session_start();
    $sonuc = $sorgu->fetch_assoc();
    $_SESSION["kullaniciId"] = $sonuc["kullanici_id"];
    $_SESSION["kullaniciMail"] = $sonuc["email"];
    $_SESSION["kullaniciAd"] = $sonuc["isim"];
    $_SESSION["kullaniciSoyad"] = $sonuc["soyisim"];
    setcookie("email","$mail",time()*60);
    $_SESSION["giris"]= sha1(md5("var")); // session içindeki veriyi 2 kez şifreledik.(sha1 ve md5 ile)
    $_SESSION["loggedIn"] = true;
    
    // kullanıcı dogru giriş yaptıysa satici anasayfasına yönlendirme yapıldı.
    if($sonuc["email"] == "yavuztahir9@gmail.com" && $sonuc["sifre"]=="123"){
      echo "<script>
      window.location.href = '../yönetici_anasayfa.php';
       </script>";

    }else{
      echo "<script>
      window.location.href = '../satici_anasayfa.php';
       </script>";
    }
    

  }else
  { // kullanıcı  yoksa hata mesajı verir ve sayfayı yeniler.
      echo  "<script>
      alert('Hatalı Kullanıcı Bilgisi'); window.location.href = 'giris-yap.php';
       </script>";
  }

}


?>

 







 