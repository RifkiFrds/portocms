<?php

namespace App\Models;

use App\Core\Model;

class Skill extends Model {
    protected string $table = 'skills';

    public function allGrouped(): array {
        $skills = $this->all();
        $grouped = [];
        foreach ($skills as $skill) {
            $category = $skill['category'] ?: 'Other';
            $grouped[$category][] = $skill;
        }
        return $grouped;
    }
}
