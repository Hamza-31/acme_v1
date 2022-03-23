<?php
declare(strict_types=1);
namespace classes;
use Error;
/**
 * Classe de base des entités
 */
class Entity
{
    /**
     *
     */
    /**
     * * Invoque la méthode $this->get{ucfirst($name)}() si existante et retourne son résultat.
     * Sinon, retourne null.
     * @param string $name Nom de la propriété
     * @return mixed
     */
    public function __get(string $name):mixed{
        // Construire le nom de la méthode à invoquer.
        $methodName="get".ucfirst($name);
        // Tenter de l'invoquer.
        try{
        return $this->$methodName();
        }
        catch (Error $e){
            return null;
        }
    }
}