<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Offer;

class SubscriptionController extends Controller
{
 

    public function create(){
        $shops = Shop::all();
        $offers = Offer::all();
        $isEdit = false;
        $subscription = new Subscription();

        return view('admin.subscription.create-edit',compact([
            'shops',
            'offers',
            'subscription',
            'isEdit'
        ]));
    }


    public function store(Request $request){
        $validateDate = $request->validate([
            'shop_id' => 'required',
            'offer_id' => 'required',
            'amount' => 'required',
            'start' => 'required',
            'end' => 'required',
        ]);

        Subscription::create($validateDate);
        
        return redirect('admin/subscription');
    }


    public function destroy($id){
        $subscription = Subscription::findOrFail($id);
        $subscription->delete();
        return redirect('admin/subscription');
    }


    public function update(Request $request , $id){
        $validateDate=$request->validate([
            'shop_id' => 'required',
            'offer_id' => 'required',
            'amount' => 'required',
            'start' => 'required',
            'end' => 'required',
        ]);

        $subscription = Subscription::findOrFail($id);
        $subscription = $subscription->update($validateDate);
        return redirect('admin/subscription');
    }

    public function edit($id){
        $shops = Shop::all();
        $offers = Offer::all();
        $isEdit = true;
        $subscription = Subscription::findOrFail($id);
        
        return view('admin.subscription.create-edit', compact([
            'shops',
            'offers',
            'subscription',
            'isEdit'
        ]));
    }
    
    
    public function index()
    {
        $subscriptions = Subscription::with(['offer','shop'])->get();
        
        return view('admin.subscription.index', compact([
            'subscriptions'
        ]));
    }
}
