<?php


abstract class GlobalController {
    private  $globalManager; 
    
    public static function addImage($image,$titreL){
        $succes = true;
        var_dump($image);
        var_dump($titreL);
        if(!empty($image)){
            if ($image["image"]["size"] > 1000000) {
                echo "<small>Votre fichier image est trop lourd</small>";
                $succes=false;
            }
            $extension = pathinfo($image['image']['name'])['extension'];
            if ($extension !='jpeg' && $extension!='png' && $extension !='jpg'){
                echo "<small>erreur, le fichier n'est pas dans le bon format</small>";
                $succes=false;
            }
        }
        // var_dump($succes);
        if ($succes){
            echo "<p>L'article vient d'être créé.<p>";
            // var_dump($_FILES, pathinfo($_FILES['image']['tmp_name']));
            // var_dump($data);
            $fileName = strtolower($titreL.'.'.$extension);
            $fileName = str_replace(' ','_',$fileName);
            move_uploaded_file($_FILES["image"]["tmp_name"], "public/images/".$fileName);
            var_dump($fileName);
            return $fileName;
        }
    }

}