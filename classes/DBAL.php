<?php
declare(strict_types=1);

namespace classes;

use PDO;
use PDOException;

/**
 * DBAL via PDO
 * Class 100% statique
 * Design Pattern Singleton
 */
final class DBAL
{
    /** @var array
     * Options de connexion :
     *  -Gestion des erreurs basée sur des exceptions.
     *  -Typage des colonnes respecté.
     *  -Requêtes réellement préparées plutôt que simplement simulées.
     */
    private const OPTIONS = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_STRINGIFY_FETCHES => false,
        PDO::ATTR_EMULATE_PREPARES => false
    ];

    /**
     * @var string
     * Nom de la DB.
     */
    private const NAME = 'acme_v1';

    /**
     * @var string
     * Hôte de la DB.
     */
    private const HOST = 'localhost';

    /**
     * @var int
     * Port de l'hôte
     */
    private const PORT = 3306;

    /**
     * @var string
     * Jeu de caractères de la connexion
     */
    private const CHARSET = 'utf8mb4';

    /**
     * @var string
     * Identifiant de connexion.
     */
    private const LOG = 'root';

    /**
     * @var string
     * Mot de passe de connexion
     */
    private const PWD = '';

    /**
     * @var PDO|null Instance Singleton
     */
    private static ?PDO $pdo = null;

    /**
     * Constructeur privé
     */
    private function __construct()
    {

    }

    /**
     * @return void
     * @throws PDOException Si erreur lors de la connexion.
     */
    public static function init(): void
    {
        if (!self::$pdo) {
            $dsn = "mysql:dbname=" . self::NAME . ";host=" . self::HOST . ";port=" . self::PORT . ";charset=" . self::CHARSET;
            self::$pdo = new PDO($dsn, self::LOG, self::PWD, self::OPTIONS);
        }
    }

    /**
     * Retourne l'instance Singleton de PDO
     * La méthode init() DOIT avoir été appelée auparavant.
     * @return PDO|null
     */
    public static function getPDO(): ?PDO
    {
        return self::$pdo;
    }
}