<?php

namespace App\Models;

use App\Core\Model;

class Education extends Model {
    protected string $table = 'educations';

    public function allOrdered(): array {
        $stmt = $this->db->query("SELECT * FROM {$this->table} ORDER BY start_date DESC");
        return $stmt->fetchAll();
    }
}
