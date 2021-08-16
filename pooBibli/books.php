<?php ob_start();
include_once("class/Books.php");
$livre1 = new Book (1,"public/images/livre.png","Livre 1 : Test 1",42);
$livre2 = new Book (2,"public/images/livre.png","Livre 2 : Test 2",142);
$livre3 = new Book (3,"public/images/livre.png","Livre 3 : Test 3",242);


?>


<p>Voici ma bibliothèque</p>
<table class="table text-center">
    <tr class = "table-dark">
        <th>Image</th>
        <th>Titre</th>
        <th>Nombre de pages</th>
        <th colspan="2">Action</th>
    </tr>
    <?php
    foreach (Book::$bookslisting as $cle){  
        echo "<tr>";
        echo '<td class="align-middle"><img src="'.$cle->getImage().'" alt="livre lsda" width="60px;"></td>';
        echo '<td class="align-middle">'.$cle->getTitle().'</td>';
        echo '<td class="align-middle">'.$cle->getNbpage().'</td>';
        echo '<td class="align-middle"><a href="" class="btn btn-warning">Modifier</a></td>';
        echo '<td class="align-middle"><a href="" class="btn btn-danger">Supprimer</a></td>';
        echo "</tr>";
    }
    ?>
    
</table>
<a href="" class="btn btn-success d-block">Ajouter</a>
<?php

$titre = "Livre";
$content = ob_get_clean();
require_once "template.php";


// var_dump($livre1,$livre2,$livre3);
// var_dump($livre1->getTitle());
// var_dump($listingBooks);