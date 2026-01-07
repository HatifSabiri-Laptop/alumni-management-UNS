<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    use HasFactory;

    // Table name (optional, Laravel auto-detects "alumni")
    protected $table = 'alumni';

    // Fields that can be filled
    protected $fillable = [
        'user_id',
        'full_name',
        'graduation_year',
        'program',
        'job',
        'company',
        'phone',
        'address',
    ];

    // Relation: Alumni belongs to a User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
