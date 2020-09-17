<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Repositories extends Model
{
    protected $table = 'repositories';

    protected $fillable = [
        'name', 'total_repo', 'repo_details'
    ];

}
