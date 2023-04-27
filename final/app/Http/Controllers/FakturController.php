<?php

namespace App\Http\Controllers;

use App\Models\Faktur;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class FakturController extends Controller
{

    public function getValidate(){
        return view('createFaktur');
    }

    public function postValidate(Request $request) {
        $request->Name = Session::get('namePerson');
        $request->Category =  Session::get('categoryItem');
        $request->Subtotal = Session::get('priceItem');
        $request->NameItem = Session::get('nameItem');

        $now = Carbon::now();
        $thnBln = $now->year . $now->month;
        $cek = Faktur::count();
        if($cek == 0){
            $urut = 1;
            $nomor = 'INV-' . $thnBln . $urut;
            // dd($nomor);
        }
        else{
            $ambil = Faktur::all()->last();
            $urut = (int)substr($ambil->Invoice,-3) + 1;
            $nomor = 'INV-' . $thnBln . $urut;
            // dd($nomor);
        }
        $request->Invoice = $nomor;

        $request->validate([
            'Quantity' => 'required|numeric',
            'Address' => 'required|min:10|max:100',
            'PostalCode' => 'required|min:5|max:5',
        ], [
            'Quantity.required' => 'Quantity field cannot be empty.',
            'Quantity.numeric' => 'Quantity must be numeric',

            'Address.required' => 'Address field cannot be empty.',
            'Address.min' => 'Address cannot be less than 10 characters',
            'Address.min' => 'Address cannot be greater than 100 characters',

            'PostalCode.required' => 'Postal Code field cannot be empty.',
            'PostalCode.min' => 'Postal Code can only has 5 digits.',
            'PostalCode.max' => 'Postal Code can only has 5 digits.',
        ]);

        $request->Total = $request->Subtotal * $request->Quantity;
        // dd($request->Total);
        Faktur::create([
            'Invoice' => $request->Invoice,
            'Quantity' => $request->Quantity,
            'Address' => $request->Address,
            'PostalCode' => $request->PostalCode,
            'Name' => $request->Name,
            'NameItem' => $request->NameItem,
            'Category' => $request->Category,
            'Subtotal' => $request->Subtotal,
            'Total' => $request->Total,
        ]);
        return redirect('/get-items-users');
    }

    public function getFaktur(Request $request){
        if($request->has('search')){
            $barangs = Faktur::where('Name','LIKE','%'.$request->search.'%')->orderBy('Name','ASC')->get();
        } else {
            $barangs = Faktur::orderBy('Name','ASC')->get();
        }
        return view('viewInvoice', ['barangs' => $barangs]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Faktur $faktur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faktur $faktur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Faktur $faktur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faktur $faktur)
    {
        //
    }
}
