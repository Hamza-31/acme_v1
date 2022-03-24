<?php
// Récupérer idProduct reçu en GET.

declare(strict_types=1);
require_once 'classes\Autoload.php';

use classes\Autoload;
use classes\Cfg;
use classes\DBAL;


try {
    Autoload::init();
    DBAL::init();
} catch (PDOException $e) {
    exit("Connexion DB impossible");
} catch (Exception $e) {
    exit($e->getMessage());
}

$idProduct =filter_input(INPUT_GET, 'idProduct', FILTER_VALIDATE_INT);
// Si id Product invalide, rediriger vers.
if(!$idProduct || $idProduct<0){
    header('Location:'.Cfg::APP_ERROR_404);
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XXX-appTitle-XXX</title>
    <link rel="stylesheet" href="assets/css/acme.css" />
</head>

<body>
<header></header>
<main>
    <div class="category">
        <a href="listProducts.php">Produits</a> &gt; XXX-productName-XXX
    </div>
    <div id="detailProduct">
        <img src="assets/img/product_XXX-productID-XXX_big.jpg" alt="XXX-productName-XXX" />
        <div>
            <div class="price">XXX-productPriceFormatted-XXX</div>
            <div class="category">catégorie<br />
                XXX-categoryName-XXX</div>
            <div class="ref">référence<br />
                XXX-productReference-XXX</div>
        </div>
    </div>
</main>
<footer></footer>
</body>

</html>
