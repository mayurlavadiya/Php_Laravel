<?php

//Important function and autoload to another function
if(!function_exists('p')){
    function p($data){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
}

// date formmat ma apva
if(!function_exists('get_formatted_date')){
    function get_formatted_date($date, $format){
        $formattedDate = date($format,strtotime($date));
        return $formattedDate;
    }
}