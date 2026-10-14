<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['client_name', 'phone', 'service_id', 'status'];

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
}
