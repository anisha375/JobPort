<?php

class Job extends Model {
    public function create($data) {
        $this->db->query("INSERT INTO jobs (title, description, location, salary, type, company_id) 
                          VALUES (:title, :description, :location, :salary, :type, :company_id)");
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':location', $data['location']);
        $this->db->bind(':salary', $data['salary']);
        $this->db->bind(':type', $data['type']);
        $this->db->bind(':company_id', $data['company_id']);
        return $this->db->execute();
    }

    public function getAll() {
        $this->db->query("SELECT * FROM jobs ORDER BY created_at DESC");
        return $this->db->resultSet();
    }

    public function getById($id) {
        $this->db->query("SELECT * FROM jobs WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function getByCompany($company_id) {
        $this->db->query("SELECT * FROM jobs WHERE company_id = :company_id");
        $this->db->bind(':company_id', $company_id);
        return $this->db->resultSet();
    }

    public function delete($id) {
        $this->db->query("DELETE FROM jobs WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->execute();
    }

    public function saveJob($user_id, $job_id) {
    $this->db->query("INSERT IGNORE INTO saved_jobs (user_id, job_id) VALUES (:user_id, :job_id)");
    $this->db->bind(':user_id', $user_id);
    $this->db->bind(':job_id', $job_id);
    return $this->db->execute();
}

public function unsaveJob($user_id, $job_id) {
    $this->db->query("DELETE FROM saved_jobs WHERE user_id = :user_id AND job_id = :job_id");
    $this->db->bind(':user_id', $user_id);
    $this->db->bind(':job_id', $job_id);
    return $this->db->execute();
}

public function getSavedJobs($user_id) {
    $this->db->query("SELECT j.* FROM saved_jobs s JOIN jobs j ON s.job_id = j.id WHERE s.user_id = :user_id");
    $this->db->bind(':user_id', $user_id);
    return $this->db->resultSet();
}


public function getTopJobsByApplications($limit = 3) {
        $sql = "
            SELECT jobs.*, COUNT(applications.id) AS application_count
            FROM jobs
            LEFT JOIN applications ON jobs.id = applications.job_id
            GROUP BY jobs.id
            ORDER BY application_count DESC
            LIMIT :limit
        ";

        $this->db->query($sql);
        $this->db->bind(':limit', $limit);
        return $this->db->resultSet();
    }
public function searchJobs($query = '', $location = '', $type = '') {
    $sql = "SELECT * FROM jobs WHERE 1=1";

    if (!empty($query)) {
        $sql .= " AND (title LIKE :query OR description LIKE :query)";
    }

    if (!empty($location)) {
        $sql .= " AND TRIM(LOWER(location)) = TRIM(LOWER(:location))";
    }

    if (!empty($type)) {
        $sql .= " AND TRIM(LOWER(type)) = TRIM(LOWER(:type))";
    }

    $this->db->query($sql);

    if (!empty($query)) {
        $this->db->bind(':query', '%' . $query . '%');
    }

    if (!empty($location)) {
        $this->db->bind(':location', $location);
    }

    if (!empty($type)) {
        $this->db->bind(':type', $type);
    }

    return $this->db->resultSet();
}


  public function getTotal() {
    $this->db->query("SELECT COUNT(*) as count FROM jobs");
    return $this->db->single()->count;
}
public function getAllWithEmployer() {
    $this->db->query("
        SELECT jobs.*, users.name as employer_name 
        FROM jobs 
        LEFT JOIN users ON jobs.company_id = users.id 
        ORDER BY jobs.created_at DESC
    ");
    return $this->db->resultSet();
}

public function deleteByEmployer($employerId) {
    $this->db->query("DELETE FROM jobs WHERE company_id = :id");
    $this->db->bind(':id', $employerId);
    return $this->db->execute();
}

public function getAllLocations() {
    $this->db->query("SELECT DISTINCT location FROM jobs ORDER BY location ASC");
    return $this->db->resultSet();
}



}
