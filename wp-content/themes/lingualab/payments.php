<?php

    //$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    //var_dump($actual_link);
    //exit;    
    //print_r($_POST); 
    //exit();
    ob_start();
    require_once("../../../wp-load.php");
    include_once('Przelewy24_API.php');
    $oPrzelewy24_API = new Przelewy24_API();

    if (isset($_POST['z24_kwota'])) $amount = $_POST['z24_kwota'] ;
    if (isset($_POST['z24_nazwa'])) $description = $_POST['z24_nazwa'] ;
    if (isset($_POST['z24_email'])) $email = $_POST['z24_email'] ;


    if (isset($_POST['p24_merchant_id']) AND isset($_POST['p24_sign'])) {
        if ($oPrzelewy24_API->Verify($_POST) === true) {
            // Tutaj dokonujemy aktywacji usługi, która jest opłacana
        }
    } else {
        // Powrotny adres URL
        $p24_url_return = get_permalink(395);

        // Adres dla weryfikacji płatności
        $p24_url_status = 'http://heronwebsite.pl/pbt/wp-content/themes/pbt/payments.php';

        // Kwota do zapłaty musi być pomnożona razy 100.
        // Czyli, jeżeli użytkownik ma zapłacić 499 złotych, to kwota do zapłaty
        // to 499 * 100 (wyrażona w groszach)
        $redirect = $oPrzelewy24_API->Pay($amount, $description, $email , $p24_url_return, $p24_url_status);
        Header('Location: ' . $redirect); exit;
    }