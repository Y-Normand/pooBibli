<?php ob_start();?>
<p>Page temporaire de Vardump</p>
<?php

$titre = "Validate";
$content = ob_get_clean();
require_once "template.php";