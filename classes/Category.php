<?php
declare(strict_types=1);

namespace classes;

use PDO;

/**
 * Class Category
 * Touts les propriétés à null par défaut pour d'éventuels formulaires de saisie
 */
class Category extends Entity
{
    /**
     * @var int | null
     * PK
     */
public ?int $idCategory=null;

    /**
     * @var string | null
     * Nom
     */
public ?string $nom=null;

    /**
     * Collection des produits de cette catégorie.
     * @var Product[] | null
     */
protected ?array $products=null;

/**
 * Retourne un tableau de produit (triés par nom) de cette catégorie.
 * Lazy loading
 * @return Product[] Tableau des produits.
 */
protected function getProducts(): array{
    // Si propriété non renseignée, requêter la DB.
    if(!$this->products){
        $q="SELECT * FROM product WHERE idCategory=:idCategory ORDER BY name";
        $params=[':idCategory'=>$this->idCategory];
        $rs=DBAL::getPDO()->prepare($q);
        $rs->execute($params);
        $rs->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Product::class);
        $this->products=$rs->fetchAll();
    }
    return $this->products;
}

    /**
     * Retourne un tableau de toutes les catégories triées par nom.
     * @return Category[] Les catégories.
     */
public static function all():array{
    $q="SELECT * FROM category ORDER BY name";
    $rs=DBAL::getPDO()->query($q);
    $rs->setFetchMode(PDO::FETCH_CLASS, Category::class);
    return $rs->fetchAll();
}
}