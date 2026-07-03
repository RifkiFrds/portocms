<?php

namespace App\Models;

use App\Core\Model;

class Admin extends Model {
    protected string $table = 'admins';

    public function findByUsername(string $username): ?array {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE username = :username LIMIT 1");
        $stmt->execute(['username' => $username]);
        $result = $stmt->fetch();
        return $result ?: null;
    }
}
