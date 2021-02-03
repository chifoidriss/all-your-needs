<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;
use DB;

class OfferController extends Controller
{

    public function create() {
        $offer = new Offer();
        $isEdit = false;

        return view('admin.offers.create-edit', compact([
            'offer',
            'isEdit'
        ]));
    }

    public function store(Request $request) {
        $validate = $request->validate([
            'name'  => 'required',
            'description'  => 'required',
            'price'  => 'required',
            'period'  => 'required'
        ]);
        
        Offer::create($validate);
            
        return redirect('admin/offre');
    }

    public function index() {
        $offers = Offer::all();

        return view('admin.offers.index', compact([
            'offers'
        ]));
    }

    public function edit($id) {
        $offer = Offer::findOrFail($id);
        $isEdit = true;
        
        return view('admin.offers.create-edit', compact([
            'offer',
            'isEdit'
        ]));
    }
    
    public function update(Request $request, $id) {
        $validate = $request->validate([
            'name'  => 'required',
            'description'  => 'required',
            'price'  => 'required',
            'period'  => 'required'
        ]);

        $offer = Offer::findOrFail($id);
            
        $offer->update($validate);
            
        return redirect('admin/offre');
    }

    public function destroy($id) {
        $offer = Offer::findOrFail($id);
        $offer->delete();

        return redirect("admin/offre");
    }
}
