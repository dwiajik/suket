<?php

namespace App\Repositories;

use App\Connections\Connection;
use App\Models\Voter;
use PDO;

class VoterRepository implements IRepository
{
    private $getAllVoterQuery = "SELECT * FROM voters";

    private $getVoterQuery = "SELECT * FROM voters WHERE id = ?";

    private $getVoterByUsernameQuery = "SELECT * FROM voters WHERE username = ?";

    private $insertVoterQuery = "INSERT INTO voters (username, password, identity_number, fullname, has_vote) VALUES (?, ?, ?, ?, ?)";

    private $updateVoterQuery = "UPDATE voters SET username = ?, password = ?, identity_number = ?, fullname = ?, has_vote = ? WHERE id = ?";

    private $deleteVoterQuery = "DELETE FROM voters  WHERE id = ?";

    public function getAll()
    {
        $pdo = Connection::connect();
        $voters = array();
        foreach ($pdo->query($this->getAllVoterQuery) as $row) {
            $voter = new Voter();
            $voter->id = $row['id'];
            $voter->username = $row['username'];
            $voter->password = $row['password'];
            $voter->identityNumber = $row['identity_number'];
            $voter->fullname = $row['fullname'];
            $voter->hasVote = $row['has_vote'];

            array_push($voters, $voter);
        }

        Connection::disconnect();
        return $voters;
    }

    public function get($id)
    {
        $pdo = Connection::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $q = $pdo->prepare($this->getVoterQuery);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);

        $voter = new Voter();
        $voter->id = $data['id'];
        $voter->username = $data['username'];
        $voter->password = $data['password'];
        $voter->identityNumber = $data['identity_number'];
        $voter->fullname = $data['fullname'];
        $voter->hasVote = $data['has_vote'];
        Connection::disconnect();

        return $voter;
    }

    public function getByUsername($username)
    {
        $pdo = Connection::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $q = $pdo->prepare($this->getVoterByUsernameQuery);
        $q->execute(array($username));
        $data = $q->fetch(PDO::FETCH_ASSOC);

        $voter = new Voter();
        $voter->id = $data['id'];
        $voter->username = $data['username'];
        $voter->password = $data['password'];
        $voter->identityNumber = $data['identity_number'];
        $voter->fullname = $data['fullname'];
        $voter->hasVote = $data['has_vote'];
        Connection::disconnect();

        return $voter;
    }

    public function insert($data)
    {
        $pdo = Connection::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $q = $pdo->prepare($this->insertVoterQuery);
        $q->execute(array($data->username, $data->password, $data->identityNumber, $data->fullname, $data->hasVote));
        Connection::disconnect();
    }

    public function update($data)
    {
        $pdo = Connection::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $q = $pdo->prepare($this->updateVoterQuery);
        $q->execute(array($data->username, $data->password, $data->identityNumber, $data->fullname, $data->hasVote, $data->id));

        Connection::disconnect();
    }

    public function delete($id)
    {
        $pdo = Connection::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $q = $pdo->prepare($this->deleteVoterQuery);
        $q->execute(array($id));
        Connection::disconnect();
    }
}