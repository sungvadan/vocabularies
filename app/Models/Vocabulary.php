<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vocabulary extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['word', 'definition', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
