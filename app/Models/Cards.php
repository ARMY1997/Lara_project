<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cards extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'age',
        'reason_see',
        'assign'

        //'username', 'password', 'enabled', 'role_id', 'updated_at', 'created_at'
    ];
   
        public function user(): BelongsTo
        {
            return $this->belongsTo(User::class);
        }
}
