<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class MemberDependant extends Model
{
    use HasFactory;

  
    public function principal_member(): BelongsTo
{
     return $this->belongsTo(Member::class, 'principal_member_id', 'id');
}
}
