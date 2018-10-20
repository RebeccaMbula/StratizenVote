<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


//Returns resource url, where media, css, js, etc. will be stored 
function resource_url($path){
    return base_url("resources/".$path);
}

?>