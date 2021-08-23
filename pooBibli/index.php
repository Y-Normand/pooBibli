<?php
define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

include_once("controllers/BookController.controller.php");
$bookmanager = new BookController();

try{
    if (empty($_GET['page'])){
        require "views/accueil.view.php";
    } else {
        $url = explode("/", filter_var($_GET['page']), FILTER_SANITIZE_URL);
        switch ($url[0]){
            case "accueil": 
                require "views/accueil.view.php";

                break;
            case "livres": 
                // var_dump($url);
                if (empty($url[1])){
                    $bookmanager -> displayBooks();
                } else if ($url[1]=="lire"){
                    $bookmanager -> displayBook($url[2]);
                } else if ($url[1]=="ajouter"){
                    $bookmanager -> addBook();
                } else if ($url[1]=="modifier"){
                    "on fait un troisième truc !";
                } else if ($url[1]=="supprimer"){
                    "Bah t'es dans la merde ! ";
                } else if ($url[1]=="validate"){
                    $bookmanager -> addBookValidate();
                }else {
                    throw new Exception('Error 404, page not found');
                }  
                break;
            default : 
                throw new Exception("Error 404, page not found. T'es mauvais JACK !!!!");
        } 
    }
} catch (Exception $error) {
    echo $error -> getMessage();
}
