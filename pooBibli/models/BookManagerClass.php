<?php
include_once("models/Books.php");
include_once("models/Model.php");
class BookManager extends Model{
    private $listingBooks; 
    
    public function addBook($Book)
    {
        $this->listingBooks[] =$Book;
    }


    /**
     * Get the value of listingBooks
     */ 
    public function getListingBooks()
    {
        return $this->listingBooks;
    }

    /**
     * Set the value of listingBooks
     *
     * @return  self
     */ 
    public function setListingBooks($listingBooks)
    {
        $this->listingBooks = $listingBooks;

        return $this;
    }

    public function loadingBooks(){

        $sql = "SELECT * FROM books"; 
        $req = $this->getDB()->prepare($sql); 
        $req -> execute(); 
        $books = $req->fetchAll(PDO::FETCH_OBJ); 
        foreach($books as $book){
            $add = new Book($book->id_books, $book->nom,$book->nbpages,$book->image); 
            $this->addBook($add);
        }
        
        // $this->addBook(new Book (1,"public/images/livre.png","Livre 1 : Test 1",42));
        // $this->addBook(new Book (2,"public/images/livre.png","Livre 2 : Test 2",142));
        // $this->addBook(new Book (3,"public/images/livre.png","Livre 3 : Test 3",242));
    }

    public function getBookById($id){
        foreach($this->listingBooks as $valeur){
            try {
                if ($valeur->getIdBook()==$id){
                return $valeur;
                } 
            } catch (Exception $error) {
                echo $error -> getMessage("Ce livre n'existe pas.");
            
            }
            
        }
            
    }

    public function getBookByName($name){
        foreach($this->listingBooks as $valeur){
            if ($valeur->getTitle()==$name){
                return $valeur;
            } 
        }    
    }

    public function addBookDB($titleBook,$pages,$fileName){
        $sql = "INSERT INTO books(nom,nbpages,image) VALUES(:name,:pages,:filename)";
            $req = $this->getDB()->prepare($sql);
            $result = $req->execute([
                ":name"=>$titleBook,
                ":pages"=>$pages,
                ":filename"=>$fileName,
            ]);

            $req->closeCursor();
    }
}