<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Models\Shop;
use App\Models\Offer;

class SubscriptionController extends Controller
{
 

    public function create(){
        $shop_id=Shop::all();
        $offer_id=Offer::all();
        $isEdit=false;
        $subscription= new Subscription();
        return view('admin.subscription.create-edit',compact([
            'shop_id',
            'offer_id',
            'subscription',
            'isEdit'

            ]));

    }



    public function store(Request $request){
        $validateDate=$request->validate([
            'shop_id'=>'required',
            'offer_id'=>'required',
            'amount'=>'required',
            'start'=>'required',
            'end'=>'required',
        ]);

        $subscription = Subscription::create($validateDate);
        
        return redirect('admin/subscription');

    }


    public function destroy($id){
        $delete=Subscription::findorFail($id);
        $delete->delete();
        return redirect('admin/subscription');

    }


    public function show($id){

    }


    public function update(Request $request , $id){
        $validateDate=$request->validate([
            'shop_id'=>'required',
            'offer_id'=>'required',
            'amount'=>'required',
            'start'=>'required',
            'end'=>'required',
        ]);

        $subscription = Subscription::findOrFail($id);
        $subscription = Subscription::where('id','=',$id)->update($validateDate);
        return redirect('admin/subscription');
    }

    public function edit($id){
        $shop_id=Shop::all();
        $offer_id=Offer::all();
        $isEdit=true;
        $subscription= Subscription::findOrFail($id);
        return view('admin.subscription.create-edit',compact([
            'shop_id',
            'offer_id',
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
