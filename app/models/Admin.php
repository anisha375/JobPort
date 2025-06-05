<?php

class Admin extends Model {
    public function getAllUsers() {
        $this->db->query("SELECT * FROM users");
        return $this->db->resultSet();
    }

    public function getAllJobs() {
        $this->db->query("SELECT * FROM jobs");
        return $this->db->resultSet();
    }

    public function deleteUser($id) {
        $this->db->query("DELETE FROM users WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }

    public function deleteJob($id) {
        $this->db->query("DELETE FROM jobs WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }
}
