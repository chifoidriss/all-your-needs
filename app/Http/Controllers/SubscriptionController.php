<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
<<<<<<< HEAD
    
    public function index(){

        
    }
    public function create(){

    }



    public function store(Request $request){

    }


    public function destroy($id){

    }


    public function show($id){

    }


    public function update(Request $request , $id){

    }

    public function edit($id){

=======
    public function index()
    {
        $subscriptions = Subscription::all();
        return view('vendor.subscriptions.index', compact([
            'subscriptions'
        ]));
>>>>>>> c479e5a6f965e698ade4ef0ee7deb66edd51dadd
    }
}
