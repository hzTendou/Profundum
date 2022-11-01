<?php

    if (isset($_POST["email"])){

        $kime = "admin@tendou.xyz";
        $konu = $_POST["subject"];

        $mesaj = "<h1>".$_POST["message"]."</h1>";
        $baslik = "From: ".$_POST["name"]."<".$_POST["email"].">\r\n";
        $baslik .= "Reply-to : admin@tendou.xyz\r\n";
        $baslik .= "Content-type: text/html\r\n";


        if(mail($kime,$konu,$mesaj,$baslik))
            echo "Emailiniz basariyla gonderilmistir.";
        else
            echo "Malesef emailiniz gonderilemedi.";
    }