<?php

namespace App\Models;

use App\Core\Model;

class Experience extends Model {
    protected string $table = 'experiences';

    public function allOrdered(): array {
        $stmt = $this->db->query("SELECT * FROM {$this->table} ORDER BY start_date DESC");
        return $stmt->fetchAll();
    }
}
