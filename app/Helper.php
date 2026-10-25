<?php 

if(!function_exists('nmr_format')){

    function nmr_format($number)
    {
        return '$' . number_format($number);        
    }
}