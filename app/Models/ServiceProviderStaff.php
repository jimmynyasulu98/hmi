<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ServiceProviderStaff extends Model
{
    use HasFactory;
    protected $table ='service_provider_staffs';
    public function service_provider(): BelongsTo
    {
         return $this->belongsTo(ServiceProvider::class, 'service_provider_id');
    }
    

    public function staffs()
    {
        return $this->belongsTo(Staff::class );
    }
}
