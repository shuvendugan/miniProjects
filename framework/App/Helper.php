<?php
function pr($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

function redirect($url){
    header("Location: $url");
    exit();
}

function view($filePath,$data=[]){
    $path = str_replace("\\",DIRECTORY_SEPARATOR,$filePath);
    $path = str_replace('.',DIRECTORY_SEPARATOR,$path);

    $file = APP_ROOT.DIRECTORY_SEPARATOR.'pages'.DIRECTORY_SEPARATOR.$path.'.php';
    if(file_exists($file)){
        extract($data);
        return require_once $file;
    }
    throw new Exception('Page not found '.$file) ;
}

function pageAdd($filePath){
    require_once(APP_ROOT.'/pages/'.$filePath);
}

