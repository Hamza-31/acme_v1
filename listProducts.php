<?php
declare(strict_types=1);
require_once 'classes\Autoload.php';

use classes\Autoload;
use classes\Category;
use classes\DBAL;
use classes\Product;

try{
    Autoload::init();
    DBAL::init();
}catch(PDOException $e){
    exit("Connexion DB impossible");
} catch(Exception $e){
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
    <title>XXX-appTitle-XXX</title>
    <link rel="stylesheet" href="assets/css/acme.css" />
</head>

<body>
    <header></header>
    <main>
        <?php foreach($categories as $category){?>
        <div class="category"><?= $category->name ?></div>

        <div class="blockProduct">
            <a href="">
                <img class="thumbnail" src="assets/img/product_XXX-productID-XXX_small.jpg" alt="XXX-productName-XXX" />
                <div class="name"></div>
            </a>
        </div>

        <?php } ?>
    </main>
    <footer></footer>
</body>

</html>