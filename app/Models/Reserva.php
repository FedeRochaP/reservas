<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Hospedajes;
use App\Models\User;

class Reserva extends Model
{
    use HasFactory;
    protected $fillable = ['hospedajes_id', 'start_date', 'end_date', 'user_id'];

    public function hospedaje() :BelongsTo {
        return $this->belongsTo(Hospedajes::class);
    }
    public function user() :BelongsTo {
        return $this->belongsTo(User::class);
    }
}
