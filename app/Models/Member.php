<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use function Laravel\Prompts\search;

class Member extends Authenticatable
{
    use HasFactory, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'gender',
        'marital_status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function scopeFilter($query, $search){
 
        if($search->membership_number && $search->first_name && $search->surname){
         
            $query->where('last_name','like','%'.$search->surname.'%' )
                ->orWhere('first_name','like','%'.$search->first_name.'%')
            #->orWhere('membership_number','like','%'.$search->membership_number.'%')
            ;
        }
        elseif($search->first_name && $search->surname ?? false ){
            $query->where('first_name','like','%'.$search->first_name.'%')
            ->orWhere('last_name','like','%'.$search->surname.'%')
            ;
        }
        elseif($search->surname && $search->membership_number ?? false ){
            $query->where('last_name','like','%'.$search->surname.'%',
            )
            #->orWhere('membership_number','like','%'.$search->surname.'%')
            ;
        }
        elseif($search->first_name && $search->membership_number ?? false ){
            $query->where('first_name','like','%'.$search->first_name.'%',
            )
             #->orWhere('membership_number','like','%'.$search->surname.'%')
            ;
        }
        elseif($search->first_name ?? false ){
            $query->where('first_name','like','%'.$search->first_name.'%'
            );
        }
        elseif($search->surname ?? false ){
            $query->where('last_name','like','%'.$search->surname.'%',
            );
        }
        elseif($search->membership_number ?? false ){
            $query->where('last_name','like','%'.$search->membership_number.'%',
            );
        }

    }
    public function member():BelongsToMany
    {
        return $this->belongsToMany(Member::class, 'user_follower', 'following_id', 'follower_id');
    }

    public function principal_member(): HasOne
{
     return $this->hasOne(MemberDependant::class,'dependant_id');
}

    public function dependants()
    {
        return $this->belongsToMany(Member::class, 'member_dependants','principal_member_id', 'dependant_id' );
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }
}
