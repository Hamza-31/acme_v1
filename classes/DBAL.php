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
            $dsn = "mysql:dbname=" . Cfg::DB_NAME . ";host=" . Cfg::DB_HOST . ";port=" . Cfg::DB_PORT . ";charset=" . Cfg::DB_CHARSET;
            self::$pdo = new PDO($dsn, Cfg::DB_LOG, Cfg::DB_PWD, Cfg::DB_OPTIONS);
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