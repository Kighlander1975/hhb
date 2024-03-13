<?php

if ( ! function_exists('current_user')) {

    function current_user() 
    {
        $auth = service("auth");

        return $auth->getCurrentUser();
    }
}

if ( ! function_exists('deutscherMonat')) {

    function deutscherMonat($month) {
        $monate = [
            1   => 'Januar',
            2   => 'Februar',
            3   => 'M&auml;rz',
            4   => 'April',
            5   => 'Mai',
            6   => 'Juni',
            7   => 'Juli',
            8   => 'August',
            9   => 'September',
            10  => 'Oktober',
            11  => 'November',
            12  => 'Dezember',
        ];

        return $monate[$month];
    }
}