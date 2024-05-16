<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Spatie\Permission\Traits\HasRoles;

class Curso extends Model
{
    use HasFactory;
    use HasRoles;

    protected $fillable = ['nombre', 'user_id'];

    public function teacher()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
