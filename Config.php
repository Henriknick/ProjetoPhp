<?php

spl_autoload_register(function ($className) {
    $pasta = "Class";
    $filename = $pasta.DIRECTORY_SEPARATOR.$className.".php";
   
    if(file_exists($filename)){
        require_once ($filename);
    }    
});
