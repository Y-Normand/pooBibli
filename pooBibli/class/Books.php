<?php
class Book {
    private $idBook;
    private $image;
    private $title;
    private $nbpage;
    public static $bookslisting;


    function __construct($idBook,$image,$title,$nbpage)
    {
        $this->idBook =$idBook;
        $this->image =$image;
        $this->title = $title;
        $this->nbpage = $nbpage;
        self::$bookslisting[] = $this;
    }

    public function getBook(){
        return $this->idBook;
        return $this->title;
        return $this->nbpage;
        return $this->image;
    } 


    /**
     * Get the value of title
     */ 
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of image
     */ 
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */ 
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get the value of nbpage
     */ 
    public function getNbpage()
    {
        return $this->nbpage;
    }

    /**
     * Set the value of nbpage
     *
     * @return  self
     */ 
    public function setNbpage($nbpage)
    {
        $this->nbpage = $nbpage;

        return $this;
    }

    /**
     * Get the value of idBook
     */ 
    public function getIdBook()
    {
        return $this->idBook;
    }

    /**
     * Set the value of idBook
     *
     * @return  self
     */ 
    public function setIdBook($idBook)
    {
        $this->idBook = $idBook;

        return $this;
    }
}