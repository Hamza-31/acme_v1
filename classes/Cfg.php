<?php

namespace classes;
use PDO;

/**
 * Classe 100% statique de configuration.
 */
final class Cfg
{
    /**
     * @var string Chemin du fichier d'erreur 404.
     */
    public const APP_ERROR_404="error_404.php";

    /** @var array
     * Options de connexion :
     *  -Gestion des erreurs basée sur des exceptions.
     *  -Typage des colonnes respecté.
     *  -Requêtes réellement préparées plutôt que simplement simulées.
     */
    public const DB_OPTIONS = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_STRINGIFY_FETCHES => false,
        PDO::ATTR_EMULATE_PREPARES => false
    ];

    /**
     * @var string
     * Nom de la DB.
     */
    public const DB_NAME = 'acme_v1';

    /**
     * @var string
     * Hôte de la DB.
     */
    public const DB_HOST = 'localhost';

    /**
     * @var int
     * Port de l'hôte
     */
    public const DB_PORT = 3306;

    /**
     * @var string
     * Jeu de caractères de la connexion
     */
    public const DB_CHARSET = 'utf8mb4';

    /**
     * @var string
     * Identifiant de connexion.
     */
    public const DB_LOG = 'root';

    /**
     * @var string
     * Mot de passe de connexion
     */
    public const DB_PWD = '';

    /**
     * @var string Titre de l'application
     */
public const APP_TITLE="ACME";

    /**
     * @var string Chemin de répertoire de l'image.
     */
public const IMG_PATH= 'assets/img/';
    /**
     * @var string Constante pour la taille small de l'image
     */
public const IMG_SMALL= 'small';
    /**
     * @var string Constante pour la taille big de l'image
     */
public const IMG_BIG = 'big';

    /**
     * @var string Langue locale.
     */
public const APP_LOCALE='fr_FR';

    /**
     * @var string Devis locale.
     */
public const APP_CURRENCY='€';


    /**
     * Constructeur Privé
     */
private function __construct(){
}
}