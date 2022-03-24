<?php
declare(strict_types=1);
require_once 'classes\Autoload.php';

use classes\Autoload;
use classes\Category;
use classes\Cfg;
use classes\DBAL;
use classes\Product;

try {
    Autoload::init();
    DBAL::init();
} catch (PDOException $e) {
    exit("Connexion DB impossible");
} catch (Exception $e) {
    exit($e->getMessage());
}

$categories = Category::all();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= Cfg::APP_TITLE ?> APP</title>
    <link rel="stylesheet" href="assets/css/acme.css"/>
</head>

<body>
<header></header>
<main>
    <?php foreach ($categories as $category) { ?>
        <div class="category"><?= $category->name ?></div>
        <?php foreach ($category->products as $product) {

            ?>
            <div class="blockProduct">
                <a href="showProduct.php?idProduct=<?=$product->idProduct?>">
                    <img class="thumbnail" src="<?= $product->getImgPath(Cfg::IMG_SMALL) ?>"
                         alt="<?= $product->name ?>"/>
                    <div class="name"><?= $product->name ?></div>
                </a>
            </div>
        <?php } ?>
    <?php } ?>
</main>
<footer></footer>
</body>

</html>