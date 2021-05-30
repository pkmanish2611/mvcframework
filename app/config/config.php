<?php
    //Database params
    define('DB_HOST', 'localhost'); 
    define('DB_USER', 'root');  
    define('DB_PASS', '');  
    define('DB_NAME', 'bookshelf'); 

    //Sitename
    define('SITENAME', 'Bookshelf');

    define('PROTOCOL','https');

    $path = str_replace("\\", "/", ($_SERVER["SERVER_NAME"] == "localhost") ? "http://localhost/mvcframework/public/assets/" : "http://your_site_name.com/");
    $path = str_replace($_SERVER['DOCUMENT_ROOT'], "", $path);  
    define("ROOT", dirname(dirname(__FILE__))); 
    define('ASSETS', str_replace("app/core", "public/assets", $path));
    define('URLROOT', 'http://localhost/mvcframework/');
     


    define('DEBUG',true);

    if(DEBUG){
        ini_set("display_errors",1);
    }else{
        ini_set("display_errors", 0);
    }
  
