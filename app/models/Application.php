<?php

class Application extends Model {
    public function apply($user_id, $job_id) {
        $this->db->query("INSERT INTO applications (user_id, job_id) VALUES (:user_id, :job_id)");
        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':job_id', $job_id);
        return $this->db->execute();
    }

    public function getByUser($user_id) {
        $this->db->query("SELECT a.*, j.title, j.location 
                          FROM applications a 
                          JOIN jobs j ON a.job_id = j.id 
                          WHERE a.user_id = :user_id");
        $this->db->bind(':user_id', $user_id);
        return $this->db->resultSet();
    }

    public function getByJob($job_id) {
        $this->db->query("SELECT a.*, u.name, u.email 
                          FROM applications a 
                          JOIN users u ON a.user_id = u.id 
                          WHERE a.job_id = :job_id");
        $this->db->bind(':job_id', $job_id);
        return $this->db->resultSet();
    }

    public function hasApplied($user_id, $job_id) {
        $this->db->query("SELECT * FROM applications WHERE user_id = :user_id AND job_id = :job_id");
        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':job_id', $job_id);
        return $this->db->single();
    }
    public function getTotal() {
    $this->db->query("SELECT COUNT(*) as count FROM applications");
    return $this->db->single()->count;
}

public function getAverageApplicationsPerJob() {
    $this->db->query("
        SELECT 
          (SELECT COUNT(*) FROM applications) / 
          (SELECT COUNT(*) FROM jobs) AS rate
    ");
    return round($this->db->single()->rate ?? 0, 2);
}
public function countApplicationsPerJob() {
    $this->db->query("
        SELECT job_id, COUNT(*) as count 
        FROM applications 
        GROUP BY job_id
    ");
    $results = $this->db->resultSet();
    $map = [];
    foreach ($results as $r) {
        $map[$r->job_id] = $r->count;
    }
    return $map;
}

}
