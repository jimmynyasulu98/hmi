<?php

namespace App\Http\Controllers\Claim;

use Inertia\Inertia;
use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserClaimController extends Controller
{
    public function find_user(Request $request){
    
        $members = Member::latest()->filter($request)->get();;
      
        return Inertia::render('Claim/NewUserClaim', [
            'members' => $members
         ]);
    }
    public function new_claim_form(Request $request){
        dd($request->member);
    }
    public function new_claim(Request $request){
        dd($request);
    }
}
