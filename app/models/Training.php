<?php

class Training extends Model {

    public function getAll() {
        $this->db->query("SELECT * FROM trainings ORDER BY created_at DESC");
        return $this->db->resultSet();
    }

    public function create($data) {
        $this->db->query("INSERT INTO trainings (title, content, image, admin_id) VALUES (:title, :content, :image, :admin_id)");
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':content', $data['content']);
        $this->db->bind(':image', $data['image']);
        $this->db->bind(':admin_id', $data['admin_id']);
        return $this->db->execute();
    }

    public function getById($id) {
        $this->db->query("SELECT * FROM trainings WHERE id = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function delete($id) {
    $this->db->query("DELETE FROM trainings WHERE id = :id");
    $this->db->bind(':id', $id);
    return $this->db->execute();
}

public function update($id, $data) {
    $query = "UPDATE trainings SET title = :title, content = :content";

    if (!empty($data['image'])) {
        $query .= ", image = :image";
    }

    $query .= " WHERE id = :id";

    $this->db->query($query);
    $this->db->bind(':title', $data['title']);
    $this->db->bind(':content', $data['content']);
    if (!empty($data['image'])) {
        $this->db->bind(':image', $data['image']);
    }
    $this->db->bind(':id', $id);
    return $this->db->execute();
}

}
