<?php

class Database
{
    public $conn;
    private $host = 'localhost:3305';
    private $username = 'root';
    private $password = '';
    private $db = 'api';

    public function getConnection()
    {
        $this->conn = null;

        try {
            $this->conn = new PDO(
                'mysql:host=' . $this->host . ';dbname=' . $this->db,
                $this->username,
                $this->password
            );
        } catch (PDOException $e) {
            echo 'Falha na Conexão: ' . $e->getMessage();
        }
        return $this->conn;
    }

    public function createUser($username, $email, $password, $adress, $phone)
    {
        $sql =
            "INSERT INTO user (username, email, password, adress, phone) 
            VALUES ('" .
            $username .
            "', '" .
            $email .
            "','" .
            $password .
            "','" .
            $adress .
            "','" .
            $phone .
            "')";
        $stmt = $this->conn->prepare($sql);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    public function readUser()
    {
        $data = [];
        $sql = 'SELECT * FROM user';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $result;
        }
        return $data;
    }
    public function updateUser(
        $id,
        $username,
        $email,
        $password,
        $adress,
        $phone
    ) {
        $user = [
            'id' => $id,
            'username' => $username,
            'email' => $email,
            'password' => $password,
            'adress' => $adress,
            'phone' => $phone,
        ];

        $sql =
            'UPDATE user SET username = :username, email = :email, password = :password, adress = :adress, phone = :phone WHERE id = :id';
        $stmt = $this->conn->prepare($sql);

        if ($stmt->execute($user)) {
            return true;
        } else {
            return false;
        }
    }
    public function user_exist($id) {
        $sql = 'SELECT id FROM user WHERE id ='.$id;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function deleteUser($id){
        //$id = $id;
        if($this->user_exist($id)) {

            $sql = 'DELETE FROM user WHERE id = '.$id;
            $stmt = $this->conn->prepare($sql);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }
    
    public function readComplaint()
    {
        $data = [];
        $sql = 'SELECT * FROM complaint';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $result;
        }
        return $data;
    }

    public function createComplaint($date, $time, $description, $img)
    {
        $sql =
            "INSERT INTO complaint (date, time, description, img) 
            VALUES ('" .
            $date .
            "', '" .
            $time .
            "','" .
            $description .
            "','" .
            $img .
            "')";
        $stmt = $this->conn->prepare($sql);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updateComplaint($id, $date, $time, $description, $img)
    {
        $user = [
            'id' => $id,
            'date' => $date,
            'time' => $time,
            'description' => $description,
            'img' => $img,
        ];

        $sql =
            'UPDATE complaint SET date = :date, time = :time, description = :description, img = :img WHERE id = :id';
        $stmt = $this->conn->prepare($sql);

        if ($stmt->execute($user)) {
            return true;
        } else {
            return false;
        }
    }
    public function complaint_exist($id) {
        $sql = 'SELECT id FROM complaint WHERE id ='.$id;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function deleteComplaint($id){
        //$id = $id;
        if($this->complaint_exist($id)) {

            $sql = 'DELETE FROM complaint WHERE id = '.$id;
            $stmt = $this->conn->prepare($sql);
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function login($email, $password){
        $login = array (
            "email" => $email,
            "password" => $password
        );

        $sql = 'SELECT * FROM user WHERE email = :email AND password = :password';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($login);
        
        //$rows = $stmt->rowCount(); echo $rows; exit;

        if ($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        }
    }


?>
