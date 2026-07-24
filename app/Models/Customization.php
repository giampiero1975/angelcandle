<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customization extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'candle_id',
        'name',
        'value',
        'additional_price',
    ];
    
    public function candle()
    {
        return $this->belongsTo(Candle::class);
    }
}