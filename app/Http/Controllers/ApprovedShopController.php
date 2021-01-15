<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;

class ApprovedShopController extends Controller
{
    public function index(){
        $shops= Shop::with(['type_shop'])->get();
        return view('admin/approved_shop/index',compact('shops'));
    }

    public function store(){

    }

    public function edit($id){
       $approved_shop=Shop::findOrFail($id);
       return view ('admin.approved_shop.boost_shop',compact('approved_shop'));
    }

    public function create(){
        
    }

    public function update(){
        
    }

    public function destroy($id){
        $status=1;
        Shop::where('id','=',$id)->update(['status'=>$status]);
         return redirect()->route('admin.approved_shop.index');
    }

}
