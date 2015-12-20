<?php

namespace App\Repositories;

use App\Connections\Connection;
use App\Models\VoterLog;
use PDO;

class VoterLogRepository implements IRepository
{
    private $getAllVoterLogQuery = "SELECT * FROM voter_logs";

    private $getVoterLogQuery = "SELECT * FROM voter_logss WHERE id = ?";

    private $insertVoterLogQuery = "INSERT INTO voter_logss (timestamp, voter_id) VALUES (?, ?)";

    private $updateVoterLogQuery = "UPDATE voter_logss SET timestamp = ?, voter_id = ? WHERE id = ?";

    private $deleteVoterLogQuery = "DELETE FROM voter_logss  WHERE id = ?";

    public function getAll()
    {
        $pdo = Connection::connect();
        $voterLogs = array();
        foreach ($pdo->query($this->getAllVoterLogQuery) as $row) {
            $voterLog = new VoterLog();
            $voterLog->id = $row['id'];
            $voterLog->timestamp = $row['timestamp'];
            $voterLog->voter_id = $row['voterId'];

            array_push($voterLogs, $voterLog);
        }

        Connection::disconnect();
        return $voterLogs;
    }

    public function get($id)
    {
        $pdo = Connection::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $q = $pdo->prepare($this->getVoterLogQuery);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);

        $voterLog = new VoterLog();
        $voterLog->id = $data['id'];
        $voterLog->timestamp = $data['timestamp'];
        $voterLog->voter_id = $data['voterId'];
        Connection::disconnect();

        return $voterLog;
    }

    public function insert($data)
    {
        $pdo = Connection::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $q = $pdo->prepare($this->insertVoterLogQuery);
        $q->execute(array($data->timestamp, $data->voter_id));
        Connection::disconnect();
    }

    public function update($data)
    {
        $pdo = Connection::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $q = $pdo->prepare($this->updateVoterLogQuery);
        $q->execute(array($data->timestamp, $data->voter_id, $data->id));
        Connection::disconnect();
    }

    public function delete($id)
    {
        $pdo = Connection::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $q = $pdo->prepare($this->deleteVoterLogQuery);
        $q->execute(array($id));
        Connection::disconnect();
    }
}