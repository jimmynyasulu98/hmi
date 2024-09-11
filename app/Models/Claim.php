<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Claim extends Model
{
    use HasFactory;
    protected $fillable = [
        'member_id',
        'service_provider_id',
        'total',
        'submitted',
        'approved',
    ];

    public $rules = [
        'total' => 'integer|min:0',
    ];

    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class);
    }
    public function service_provider(): BelongsTo
    {
        return $this->belongsTo(ServiceProvider::class);
    }
}
