<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

class ProjectUser extends Model
{

    public const STATUSES = [
        1 => 'Active',
        2 => 'Inactive'
    ];

    protected $fillable = [
        'user_id', 'project_id', 'role_id', 'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function roles()
    {
        return $this->belongsTo(Role::class);
    }
}
