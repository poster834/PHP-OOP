<?php
namespace MyProject\Services;

use PDO;

class Db
{
    private $pdo;

    public function __construct()
    {
        $dbOptions = (require __DIR__.'/../../settings.php')['db'];
        $this->pdo = new PDO(
            'mysql:host='.$dbOptions['host'].'; dbname='.$dbOptions['dbname'], $dbOptions['user'],$dbOptions['password']
        );
        $this->pdo->exec('SET NAMES UTF8');
    }

    public function query(string $sql, $params = []): ?array
    {
        $sth = $this->pdo->prepare($sql);
        $result = $sth->execute($params);

        if ($result === false) {
            return null;
        }
        return $sth->fetchAll();
    }
}