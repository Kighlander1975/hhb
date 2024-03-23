<?php

if( ! function_exists('getUserAmmount')) {

    function getUserAmmount($id)
    {
        $db = \Config\Database::connect();
        $sql = "SELECT ammount,zeit FROM ammount WHERE user_id = '".$id."'";
        $query = $db->query($sql);
        $result = $query->getRow();
        if($result === null) {
            $ret = (object)['ammount' => 0.00,'zeit' => date('d.m.Y')];
        } else {
            $ret = $result;
        }
        return $ret;
    }
}

if( ! function_exists('ammountexists')){

    function ammountexists($id)
    {
        $db = \Config\Database::connect();
        $sql = "SELECT ammount,zeit FROM ammount WHERE user_id = '".$id."'";
        $query = $db->query($sql);
        $result = $query->getRow();
        return ($result === null) ? false : true;
    }
}

if( ! function_exists('getCountBookings')) {

    function getCountBookings($id,$e_a=null)
    {
        $db = \Config\Database::connect();
        if($e_a === null) {
            $xtraand = "";
        } else {
            $xtraand = " AND e_a = '".$e_a."'";
        }
        $month = (int)date('m');
        $sql = "SELECT id,zeit FROM buchungen WHERE MONTH(zeit) = ".$month." AND user_id = '".$id."'".$xtraand;
        // dd($sql);
        $query = $db->query($sql);
        $result = $query->getResult();
        $anz = count($result);
        return $anz;
    }
}

if( ! function_exists('sumBookings')) {

    function sumBookings($id,$e_a)
    {
        $db = \Config\Database::connect();
        $month = (int)date('m');
        $sql = "SELECT zeit,SUM(ammount) AS summe FROM buchungen WHERE MONTH(zeit) = ".$month." AND user_id = '".$id."' AND e_a = '".$e_a."'";
        $query = $db->query($sql);
        $result = $query->getRow();
        $summe = $result->summe;
        return $summe;
    }
}

if( ! function_exists('lastBookings')) {

    function lastBookings($id)
    {
        $db = \Config\Database::connect();
        $sql = "SELECT * FROM buchungen WHERE user_id = '".$id."' ORDER BY zeit LIMIT 3";
        $query = $db->query($sql);
        $result = $query->getResult();
        return $result;
    }
}

if( ! function_exists('deutschesDatum')) {

    function deutschesDatum($datum)
    {
        $dateTime = date_create($datum, timezone_open('Europe/Berlin'));
        $formatter = datefmt_create('de_DE', IntlDateFormatter::LONG, IntlDateFormatter::NONE);
        $formattedDate = datefmt_format($formatter, $dateTime);
        return $formattedDate;
    }
}