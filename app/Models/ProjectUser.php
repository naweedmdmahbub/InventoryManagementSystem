<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectUser extends Model
{

    public const STATUSES = [
        1 => 'Active',
        2 => 'Inactive'
    ];

    protected $fillable = [
        'user_id', 'project_id', 'role_id', 'status'
    ];
}
