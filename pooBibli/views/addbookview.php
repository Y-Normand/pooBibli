<?php ob_start();?>
<form action="validate" method="POST" enctype="multipart/form-data">
  <div class="mb-3 text-center">
    <label for="titre" class="form-label text-info">Titre du livre</label>
    <input type="text" class="form-control border-info" id="titre" name="titre">
  </div>
  <div class="mb-3 text-center">
    <label for="nbpages" class="form-label text-info">Nombre de pages</label>
    <input type="text" class="form-control border-info" name="nbpages" id="nbpages">
  </div>
  <div class="mb-3 text-center">
    <label for="image" class="form-label text-info">Choississez une image</label>
    <input class="form-control border-info alert-info" name="image" type="file" id="image">
  </div>
  <div class="d-grid gap-2 col-6 mx-auto">
    <button type="submit" class="btn btn-outline-success">Ajouter</button>
  </div>
  
</form>
<?php
$titre = "Ajouter un livre";
$content = ob_get_clean();
require_once "template.php";