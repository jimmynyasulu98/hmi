<?php

namespace App\Http\Controllers\Claim;

use Inertia\Inertia;
use App\Models\Claim;
use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceProviderClaimController extends Controller
{
    
    public function index(Request $request){
        $claims = Claim::where('approved', 0)->orderBy('created_at')->get();
        

        return Inertia::render('Claim/ServiceProviderClaims', [
            'claims' => $claims->load('member')
         ]);
    }

    public function find_user(Request $request){
    
        $members = Member::latest()->filter($request)->get();
      
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
    public function show(Request $request){

        $claim = Claim::find($request->claim);
    
        return Inertia::render('Claim/Show', [
            'claim' => $claim
         ]);
    }
}
