<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Could be used for searching later, if searching for
// users with the same name.
class Handle extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'handle_name',
        'user_id',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
