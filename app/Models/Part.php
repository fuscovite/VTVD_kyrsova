<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    use HasFactory;

    protected $fillable = ['oem_number', 'name', 'supplier', 'price'];

    protected function casts(): array
    {
        return ['price' => 'decimal:2'];
    }
}
