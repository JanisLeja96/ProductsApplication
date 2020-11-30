<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryOption extends Model
{
    protected $fillable = ['name', 'price_modifier'];
    use HasFactory;

    public function getPrice($size) {
        $requiredPrice = 'price_' . mb_strtolower($size);
        return '$' . number_format($this->$requiredPrice / 100, 2, ',', '.');
    }
}
