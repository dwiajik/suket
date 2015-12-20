<?php

namespace App\Repositories;


use App\Connections\Connection;
use App\Models\Candidate;
use PDO;

class CandidateRepository implements IRepository
{
    private $getAllCandidateQuery = "SELECT * FROM candidates ORDER BY candidates.candidate_number ASC";

    private $getCandidateQuery = "SELECT * FROM candidates WHERE id = ?";

    private $insertCandidateQuery = "INSERT INTO candidates (candidate_number, name, photo, vision, mission, voters_count) VALUES (?, ?, ?, ?, ?, ?)";

    private $updateCandidateQuery = "UPDATE candidates SET candidate_number = ?, name = ?, photo = ?, vision = ?, mission = ?, voters_count = ? WHERE id = ?";

    private $deleteCandidateQuery = "DELETE FROM candidates  WHERE id = ?";

    public function getAll()
    {
        $pdo = Connection::connect();
        $candidates = array();
        foreach ($pdo->query($this->getAllCandidateQuery) as $row) {
            $candidate = new Candidate();
            $candidate->id = $row['id'];
            $candidate->candidateNumber = $row['candidate_number'];
            $candidate->name = $row['name'];
            $candidate->photo = $row['photo'];
            $candidate->vision = $row['vision'];
            $candidate->mission = $row['mission'];
            $candidate->votersCount = $row['voters_count'];

            array_push($candidates, $candidate);
        }

        Connection::disconnect();
        return $candidates;
    }

    public function get($id)
    {
        $pdo = Connection::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $q = $pdo->prepare($this->getCandidateQuery);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);

        $candidate = new Candidate();
        $candidate->id = $data['id'];
        $candidate->candidateNumber = $data['candidate_number'];
        $candidate->name = $data['name'];
        $candidate->photo = $data['photo'];
        $candidate->vision = $data['vision'];
        $candidate->mission = $data['mission'];
        $candidate->votersCount = $data['voters_count'];

        Connection::disconnect();

        return $candidate;
    }

    public function insert($data)
    {
        $pdo = Connection::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $q = $pdo->prepare($this->insertCandidateQuery);
        $q->execute(array($data->candidateNumber,
            $data->name,
            $data->photo,
            $data->vision,
            $data->mission,
            $data->votersCount));

        Connection::disconnect();
    }

    public function update($data)
    {
        $pdo = Connection::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $q = $pdo->prepare($this->updateCandidateQuery);
        $q->execute(array($data->candidateNumber,
            $data->name,
            $data->photo,
            $data->vision,
            $data->mission,
            $data->votersCount,
            $data->id));

        Connection::disconnect();
    }

    public function delete($id)
    {
        $pdo = Connection::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $q = $pdo->prepare($this->deleteCandidateQuery);
        $q->execute(array($id));
        Connection::disconnect();
    }
}