<?php ob_start();




// var_dump($bookmanager);

?>


<p>Voici ma bibliothèque</p>
<table class="table text-center">
    <tr class = "table-dark">
        <th>Image</th>
        <th>Titre</th>
        <th>Nombre de pages</th>
        <th colspan="3">Action</th>
    </tr>
    <?php

    //foreaché sur la liste du manager
    foreach ($stockbooks as $cle){  
        echo "<tr>";
        echo '<td class="align-middle"><img src="public/images/'.$cle->getImage().'" alt="livre lsda" width="60px;"></td>';
        echo '<td class="align-middle">'.$cle->getTitle().'</td>';
        echo '<td class="align-middle">'.$cle->getNbpage().'</td>';
        echo '<td class="align-middle"><a href="livres/lire/'.$cle->getIdBook().'" class="btn btn-success">Lire</a></td>';
        echo '<td class="align-middle"><a href="" class="btn btn-warning">Modifier</a></td>';
        echo '<td class="align-middle"><a href="" class="btn btn-danger">Supprimer</a></td>';
        echo "</tr>";
    }
    ?>
    
</table>
<a href="livres/ajouter" class="btn btn-success d-block">Ajouter</a>
<?php

$titre = "Livre";
$content = ob_get_clean();
require_once "template.php";



// var_dump($livre1,$livre2,$livre3);
// var_dump($livre1->getTitle());
var_dump($stockbooks);