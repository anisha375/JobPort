<?php

class User extends Model {
    public function register($data) {
        $this->db->query("INSERT INTO users (name, email, password, role) VALUES (:name, :email, :password, :role)");
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
         $this->db->bind(':password', $data['password']);
        $this->db->bind(':role', $data['role']);
        return $this->db->execute();
    }

    public function login($email) {
        $this->db->query("SELECT * FROM users WHERE email = :email");
        $this->db->bind(':email', $email);
        return $this->db->single();
    }

    public function getById($id) {
        $this->db->query("SELECT * FROM users WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    


    public function getByRole($role) {
        $this->db->query("SELECT * FROM users WHERE role = :role");
        $this->db->bind(':role', $role);
        return $this->db->resultSet();
    }

    public function getTotal() {
    $this->db->query("SELECT COUNT(*) as count FROM users");
    return $this->db->single()->count;
}

public function countByRole($role) {
    $this->db->query("SELECT COUNT(*) as count FROM users WHERE role = :role");
    $this->db->bind(':role', $role);
    return $this->db->single()->count;
}


public function updatePassword($id, $hashedPassword) {
    $this->db->query("UPDATE users SET password = :pass WHERE id = :id");
    $this->db->bind(':pass', $hashedPassword);
    $this->db->bind(':id', $id);
    return $this->db->execute();
}
public function delete($id) {
    $this->db->query("DELETE FROM users WHERE id = :id");
    $this->db->bind(':id', $id);
    return $this->db->execute();
}

public function updateProfile($id, $data) {
    $this->db->query("UPDATE users SET phone = :phone, address = :address, bio = :bio, skills = :skills, cv_file = :cv_file WHERE id = :id");
    $this->db->bind(':phone', $data['phone']);
    $this->db->bind(':address', $data['address']);
    $this->db->bind(':bio', $data['bio']);
    $this->db->bind(':skills', $data['skills']);
    $this->db->bind(':cv_file', $data['cv_file']);
    $this->db->bind(':id', $id);
    return $this->db->execute();
}

public function getApplications($userId) {
    $this->db->query("SELECT jobs.title, jobs.location, jobs.type, applications.applied_at 
                      FROM applications 
                      JOIN jobs ON applications.job_id = jobs.id 
                      WHERE applications.user_id = :user_id");
    $this->db->bind(':user_id', $userId);
    return $this->db->resultSet();
}


}
