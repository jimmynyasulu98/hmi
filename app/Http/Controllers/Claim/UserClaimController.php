<?php

namespace App\Http\Controllers\Claim;

use Inertia\Inertia;
use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Claim;

class UserClaimController extends Controller
{
    public function find_user(Request $request){
    
        $members = Member::latest()->filter($request)->get();;
      
        return Inertia::render('Claim/NewUserClaim', [
            'members' => $members
         ]);
    }
    public function new_claim_form(Request $request){
        
        $validated = $request->validate([
            'member' => 'numeric',
        ]);
    
        $createdRecord = Claim::query()->create(
            [
                'member_id' => $request->member,
                'service_provider_id' => 1,
            ]
        );
       
        return redirect('/');
    }
    public function new_claim(Request $request){
        dd($request);
    }
}
