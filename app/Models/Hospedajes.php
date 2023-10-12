<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Reserva;

class Hospedajes extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'price', 'image', 'category'];
    public $timestamps = false;

    public function reservas():HasMany{
        return $this->hasMany(Reserva::class);
    }
}
