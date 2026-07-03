<?php

namespace App\Models;

use App\Core\Model;

class Profile extends Model {
    protected string $table = 'profiles';

    public function getFirst(): ?array {
        $stmt = $this->db->query("SELECT * FROM {$this->table} LIMIT 1");
        $result = $stmt->fetch();
        return $result ?: null;
    }
}
