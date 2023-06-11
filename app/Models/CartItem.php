<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = ['item_id'];

    public $timestamps = false;

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
