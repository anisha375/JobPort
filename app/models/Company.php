<?php

class Company extends Model {
    public function create($data) {
        $this->db->query("INSERT INTO companies (user_id, name, description, logo) 
                          VALUES (:user_id, :name, :description, :logo)");
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':logo', $data['logo']);
        return $this->db->execute();
    }

    public function getByUser($user_id) {
        $this->db->query("SELECT * FROM companies WHERE user_id = :user_id");
        $this->db->bind(':user_id', $user_id);
        return $this->db->single();
    }

    public function getAll() {
        $this->db->query("SELECT * FROM companies");
        return $this->db->resultSet();
    }

    public function getById($id) {
        $this->db->query("SELECT * FROM companies WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function updateCompanyProfile($userId, $data) {
    $query = "UPDATE companies SET name = :name, description = :description";

    if (!empty($data['logo'])) {
        $query .= ", logo = :logo";
    }

    $query .= " WHERE user_id = :user_id";

    $this->db->query($query);
    $this->db->bind(':name', $data['name']);
    $this->db->bind(':description', $data['description']);
    if (!empty($data['logo'])) {
        $this->db->bind(':logo', $data['logo']);
    }
    $this->db->bind(':user_id', $userId);
    return $this->db->execute();
}
public function getByUserId($userId) {
    $this->db->query("SELECT * FROM companies WHERE user_id = :user_id");
    $this->db->bind(':user_id', $userId);
    return $this->db->single();
}

}
