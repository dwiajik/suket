<?php

namespace App\Repositories;

use App\Connections\Connection;
use App\Models\Config;
use PDO;

class ConfigRepository implements IRepository
{
    private $getAllConfigQuery = "SELECT * FROM configs";

    private $getConfigQuery = "SELECT * FROM configs WHERE config_key = ?";

//    private $insertConfigQuery = "INSERT INTO configs (config_key, config_value) VALUES (?, ?)";

    private $updateConfigQuery = "INSERT INTO configs (config_key, config_value) VALUES (?, ?) ON DUPLICATE KEY UPDATE config_value = VALUES(config_value)";

//    private $deleteConfigQuery = "DELETE FROM configs  WHERE config_key = ?";

    public function getAll()
    {
        $pdo = Connection::connect();
        $config = new Config();
        foreach ($pdo->query($this->getAllConfigQuery) as $row) {
            $config->$row['config_key'] = $row['config_value'];
        }

        Connection::disconnect();
        return $config;
    }

    public function get($key)
    {
        $pdo = Connection::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $q = $pdo->prepare($this->getConfigQuery);
        $q->execute(array($key));
        $data = $q->fetch(PDO::FETCH_ASSOC);

        $config = new Config();
        $config->$data['config_key'] = $data['config_value'];
        Connection::disconnect();

        return $config;
    }

    public function insert($data)
    {
//        $pdo = PilihCalonConnection::connect();
//        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//        $q = $pdo->prepare($this->insertConfigQuery);
//        $q->execute(array($data->key, $data->value));
//        PilihCalonConnection::disconnect();
    }

    public function update($data)
    {
        $pdo = Connection::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $q = $pdo->prepare($this->updateConfigQuery);
        $q->execute(array("votingName", $data->votingName));
        $q->execute(array("colorTheme", $data->colorTheme));
        $q->execute(array("logo", $data->logo));
        $q->execute(array("bgLogin", $data->bgLogin));
        $q->execute(array("bgVote", $data->bgVote));

        Connection::disconnect();
    }

    public function delete($key)
    {
//        $pdo = PilihCalonConnection::connect();
//        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//        $q = $pdo->prepare($this->deleteConfigQuery);
//        $q->execute(array($key));
//        PilihCalonConnection::disconnect();
    }
}