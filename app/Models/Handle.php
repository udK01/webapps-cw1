<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Could be used for searching later, if searching for
// users with the same name.
class Handle extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class);
    }
}
