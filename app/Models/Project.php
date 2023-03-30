<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;

    public const STATUSES = [
        1 => 'New',
        2 => 'Ongoing',
        3 => 'Onhold',
        4 => 'Completed'
    ];

    protected $fillable = [
        'name', 'location', 'description', 'start_date', 'end_date', 'status', 'created_by'
    ];

    public function createdBy(){
        return $this->belongsTo(User::class, 'created_by');
    }


    public static function getStatusID($status)
    {
        return array_search($status, self::STATUSES);
    }

    public function getStatus($status)
    {
        return self::STATUSES[ $status ];
    }

    public static function getStatuses()
    {
        return self::STATUSES;
    }


    public function projectUsers()
    {
        return $this->hasMany(ProjectUser::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class,'project_users');
    }

//    public function users()
//    {
//        return $this->hasManyThrough(User::class,ProjectUser::class);
//    }
}
