<?php

include_once("models/BookManagerClass.php");
include_once("controllers/GlobalController.php");
class BookController {
    private  $bookManager; 
    


    function __construct()
    {
        $this->bookManager = new BookManager();
        $this->bookManager->loadingBooks();
    }

    public function displayBooks(){
        $stockbooks= $this->bookManager->getListingBooks();
        require "views/books.php";
    }

    public function displayBook($id){
        $leLivre = $this->bookManager->getBookById($id);
        require "views/bookview.php";
        // Ajouter un return de quelque chose ? 
    }

    public function addBook(){
        require "views/addbookview.php";
    }

    public function addBookValidate(){
        require "views/validate.php";
        $success = true;
        // var_dump($_POST['titre']);
        if (isset($_POST['titre'])){
            $titleBook = str_replace(['é','è','ê','à'],['e','e','e','a'],$_POST["titre"]);
            if (!empty($this->bookManager -> getBookByName($_POST['titre']))){
                echo "<small>Ce livre existe.</small>";
                $success = false;
            }
        }
        if (isset($_POST['nbpages'])){
            if ($_POST['nbpages'] == 0){
                echo "<small>Ce livre existe.</small>";
                $success = false;
            }
            $pages=$_POST['nbpages'];
        }
        if (isset($_FILES)){
            $fileName= GlobalController::addImage($_FILES,$titleBook);
        } 
        if ($success){
            $this->bookManager -> addBookDB($titleBook,$pages,$fileName);
            header("location:".URL."livres");
        }       
        // var_dump($titleBook, $pages, $fileName);

    }
}