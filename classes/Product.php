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
    public ?int $idProduct=null;

    /**
     * @var int|null
     */
    public ?int $idCategory =null;

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
     * Le constructeur
     * @param int|null $idProduct PK.
     */
    public function __construct(?int $idProduct=null){
        $this->idProduct=$idProduct;
    }
    /**
     * Retourne la catégorie de produit (triés par nom) de cette catégorie.
     * Lazy loading
     * @return Category | null Tableau des catégories.
     */
    protected function getCategory(): ?Category{
        // Si propriété non renseignée, requêter la DB.
        if(!$this->category){
            $q="SELECT * FROM category WHERE idCategory=:idCategory ORDER BY name";
            $params=[':idCategory'=>$this->idCategory];
            $rs=DBAL::getPDO()->prepare($q);
            $rs->execute($params);
            $rs->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Category::class);
            $this->category=$rs->fetch()?: null;
        }
        return $this->category;
    }

    /**
     * Retourne le chemin du fichier image (small ou big) associé ou produit.
     * Utilise l'image absente ou inexistante.
     * @param string $imgSize Constante IMG_SMALL ou IMG_Big.
     * @return string Chemin.
     */
    public function getImgPath(string $imgSize):string {
        $path = Cfg::IMG_PATH."product_{$this->idProduct}_{$imgSize}.jpg";
        return file_exists($path) ? $path : Cfg::IMG_PATH."product_0_{$imgSize}.jpg";
    }

    /**
     * Hydrate le produit en se basant sur sa PK.
     * @return bool Vrai si hydratation réussie. False sinon.
     */
    public function hydrate(): bool{
    //  Si idProduit invalide, retourner false.
       if(!$this->idProduct){
           return false;
       }
    // Requêter la DB.
        $q="SELECT * FROM product WHERE idProduct= :idProduct";
       $params=[':idProduct'=>$this->idProduct];
        $rs=DBAL::getPDO()->prepare($q);
        $rs->execute($params);
        $rs->setFetchMode(PDO::FETCH_INTO,$this);
    // Hydrater le produit et retourner le succès ou l'échec.
        return (bool) $rs->fetch();
    }

}