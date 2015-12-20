<?php

namespace App\Repositories;

use App\Connections\Connection;
use App\Models\UserLog;
use PDO;

class UserLogRepository implements IRepository
{
    private $getAllUserLogQuery = "SELECT * FROM user_logs";

    private $getUserLogQuery = "SELECT * FROM user_logs WHERE id = ?";

    private $insertUserLogQuery = "INSERT INTO user_logs (timestamp, user_id) VALUES (?, ?)";

    private $updateUserLogQuery = "UPDATE user_logs SET timestamp = ?, user_id = ? WHERE id = ?";

    private $deleteUserLogQuery = "DELETE FROM user_logs  WHERE id = ?";

    public function getAll()
    {
        $pdo = Connection::connect();
        $userLogs = array();
        foreach ($pdo->query($this->getAllUserLogQuery) as $row) {
            $userLog = new UserLog();
            $userLog->id = $row['id'];
            $userLog->timestamp = $row['timestamp'];
            $userLog->user_id = $row['userId'];

            array_push($userLogs, $userLog);
        }

        Connection::disconnect();
        return $userLogs;
    }

    public function get($id)
    {
        $pdo = Connection::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $q = $pdo->prepare($this->getUserLogQuery);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);

        $userLog = new UserLog();
        $userLog->id = $data['id'];
        $userLog->timestamp = $data['timestamp'];
        $userLog->user_id = $data['userId'];
        Connection::disconnect();

        return $userLog;
    }

    public function insert($data)
    {
        $pdo = Connection::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $q = $pdo->prepare($this->insertUserLogQuery);
        $q->execute(array($data->timestamp, $data->user_id));
        Connection::disconnect();
    }

    public function update($data)
    {
        $pdo = Connection::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $q = $pdo->prepare($this->updateUserLogQuery);
        $q->execute(array($data->timestamp, $data->user_id, $data->id));
        Connection::disconnect();
    }

    public function delete($id)
    {
        $pdo = Connection::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $q = $pdo->prepare($this->deleteUserLogQuery);
        $q->execute(array($id));
        Connection::disconnect();
    }
}