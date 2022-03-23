<?php
declare(strict_types=1);

namespace classes;
use PDO;

/**
 * Entité
 */
class Product extends Entity
{
    /**
     * @var int|null PK;
     */
    private ?int $idProduct;

    /**
     * @var int|null
     */
    private ?int $idCategory =null;

    /**
     * @var string|null Nom.
     */
    public ?string $name=null;

    /**
     * @var string|null Référence.
     */
    public ?string $ref=null;

    /**
     * @var float|null Prix
     */
    public ?float $price=null;

    /**
     * @var Category|null Catégorie de ce produit.
     */
    public ?Category $category=null;

    /**
     * Retourne la catégorie de produit (triés par nom) de cette catégorie.
     * Lazy loading
     * @return Category | null Tableau des catégories.
     */
    protected function getProduct(): ?Category{
        // Si propriété non renseignée, requêter la DB.
        if(!$this->category){
            $q="SELECT * FROM category WHERE idCategory=:idCategory ORDER BY name";
            $params=[':idCategory'=>$this->idCategory];
            $rs=DBAL::getPDO()->prepare($q);
            $rs->execute($params);
            $rs->setFetchMode(PDO::FETCH_CLASS, Category::class);
            $this->category=$rs->fetch()?: null;
        }
        return $this->category;
    }

}