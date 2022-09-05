<?php

include("baglanti.php");

session_start();

$islogged = false;

if(isset($_SESSION['loggedIn'])){
    if($_SESSION['loggedIn'] === true){
        $islogged = true;
    }else{
        $islogged = false;
    }
}else{
$islogged = false;
}

$kullaniciId = $_SESSION["kullaniciId"];

$urunler = $baglan->query("SELECT * FROM urun "); 
$kategoriler = $baglan->query("SELECT * FROM kategori WHERE ust_kategori_id = 0 ");

function merhabaDe($isim) {
    echo "Merhaba: " . $isim;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="AnaSayfa/CSS/stil.css">
    <link rel="stylesheet" href="AnaSayfa/CSS/dropdown.css">
    <link rel="stylesheet" href="AnaSayfa/CSS/header.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <title>Alışveriş Diyarı</title>
    
</head>
<body>
    <header class="main-header">
        
           <img src="images/logo-tasarimi.png" class="div-logo" >
        <nav class="main-nav">
            <ul class="nav-ul">

                <li class="nav-ul-li">
                    <a class="dropdown ">
                        <button onclick="myFunction()" class="dropbtn">Düzenle</button>
                            <div id="myDropdown" class="dropdown-content">
                                <a href="ürün-ekle.php" >Ürün Ekle</a>
                                <a href="ürün-sil.php">Ürün Sil</a>
                                <a href="ürün-güncelle.php">Ürün Güncelle</a>
                                <a href="kategori-ekle.php">Kategori ekle</a> 
                                <a href="kategori-sil.php">Kategori sil</a> 
                            </div>
                    </a>
                </li>
                <li class="nav-ul-li"><a href="yönetici_anasayfa.php" >AnaSayfa</a></li>
                <li class="nav-ul-li"></li>
                
                <li class="nav-ul-li"><a href="üye-ol/giris-yap.php" >Çıkış Yap</a></li>
                
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

    <div>
        <aside class="menü" id="menü">
            <ul class="menü-ul">
                <?php
                    while($row = $kategoriler->fetch_assoc()){
                        $altKategori = $baglan->query("
                            SELECT ust.kategori_adi AS 'ustKat', alt.kategori_adi AS 'altKat', ust.path AS 'altPath' FROM kategori as ust 
                            INNER JOIN kategori as alt 
                            ON ust.ust_kategori_id = alt.kategori_id
                            WHERE ust.ust_kategori_id = ".$row['kategori_id']."
                        ");
                        echo '<li class="menü-ul-li"><a href="" title="">'.$row['kategori_adi'].'</a>';
                        echo '<ul>';
                        while($innerRow = $altKategori->fetch_assoc()){
                            echo '
                                <li class="menü-ul-li"><a href="kategoriler/'.$innerRow["altPath"].'" title="">'.$innerRow["ustKat"].'</a></li>
                            ';
                        }
                        echo '</ul>';
                        echo '</li>';
                    }
                ?>
            </ul>
            
        </aside>

        <main class="Anakisim">
            
            <h5 style="text-align: center; margin-bottom: 2px;"><b>----------------------------</b></h5>
            <h5 style="text-align: center; margin-bottom: 2px;"><b>Yönetici Sayfasına Hoşgeldiniz</b></h5>
            
            <div class="Anakisim-favori-row">
                <?php

                    while($row = $urunler->fetch_assoc()){

                        $kısaAciklama = $row['urun_aciklama'];
                        $kısaAciklama = (strlen($kısaAciklama) > 30) ? substr($kısaAciklama,0,30).'...' : $kısaAciklama;

                        $name = $row['urun_adi'];
                        $name = (strlen($name) > 20) ? substr($name,0,20).'...' : $name;

                        echo '
                        <div class="Anakisim-column">
                            <div class="column-img">
                            <a href="ürün-detay.php?id='.$row["urun_id"].'">
                            
                                <img src="'.$row["imagePath"].'" >
                                </a>
                            </div>
                            <div class="column-açıklama">
                                <p> <b>'.$name.'</b>  <br> '.$kısaAciklama.'<br> '.$row["fiyati"].' TL </p>
                                
                                </div>
                         </div>';

                   }


                ?>
            </div>
            
        </main>
    </div>
    <footer>
        <div class="footer-div">
            <div class="footer-row">
                <div class="footer-column"> <i class="fa-brands fa-facebook" id="social-media"></i> </div>
                <div class="footer-column"> <i class="fa-brands fa-instagram" id="social-media"></i> </div>
                <div class="footer-column"> <i class="fa-brands fa-twitter" id="social-media"></i> </div>
            
                
            </div>

        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- bu özellikler drpdown kullanımı için kullanılmıştır. -->
    <script>
        /* When the user clicks on the button, 
        toggle between hiding and showing the dropdown content */
        function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
            }
        }
        }
    </script>
</body>
</html>

