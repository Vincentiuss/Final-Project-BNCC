<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BarangController extends Controller
{
    public function getValidate() {
        if(Auth::guest()){
            return view('createBarang');
        }
        return view('createBarang'); // nanti ganti jadi view barang
    }
      
    public function store(Request $request) {
        $request->validate([
            'Category' => 'required',
            'Name' => 'required|min:5|max:80',
            'Price' => 'required|numeric',
            'Quantity' => 'required|numeric',
            'Image'=> 'required'
        ], [
            'Category.required'=>'Category field cannot be empty.',

            'Name.required' => 'Name field cannot be empty.',
            'Name.min' => 'Name must contain at least 5 characters or more.',
            'Name.max' => 'Name must not exceed 80 characters.',

            'Price.required' => 'Price field cannot be empty.',

            'Quantity.required' => 'Quantity field cannot be empty.',
            
            'Image.required' => 'Image field cannot be empty.',
        ]);

        $file = $request->file('Image');
        $extension = $file->getClientOriginalExtension();
        $imagename = time().'.'.$extension;
        $file->move(public_path('/images'),$imagename);

        Session::put('categoryItem',$request->Category);
        Session::put('priceItem',$request->Price);
        Session::put('nameItem',$request->Name);

        Barang::create([
            'Category' => $request->Category,
            'Name' => $request->Name,
            'Price' => $request->Price,
            'Quantity' => $request->Quantity,
            'Image' => $file,
        ]);
        return redirect('get-items');
    }

    public function getItems(Request $request){
        $barangs = Barang::orderBy('Name','ASC')->get();
        return view('viewBarangAdmin', ['barangs' => $barangs]);
    }

    public function getItemsUser(Request $request){
        if($request->has('search')){
            $barangs = Barang::where('Name','LIKE','%'.$request->search.'%')->orderBy('Name','ASC')->get();
        } else {
            $barangs = Barang::orderBy('Name','ASC')->get();
        }
        return view('viewBarangUser', ['barangs' => $barangs]);
    }

    public function showdata(Request $request, $id){
        $data = Barang::find($id);
        return view('editBarang',['data'=>$data]);
    }

    function updatedata(Request $request){
        $request->validate([
            'Category' => 'required',
            'Name' => 'required|min:5|max:80',
            'Price' => 'required|numeric',
            'Quantity' => 'required|numeric',
            'Image'=> 'required'
        ], [
            'Category.required'=>'Category field cannot be empty.',

            'Name.required' => 'Name field cannot be empty.',
            'Name.min' => 'Name must contain at least 5 characters or more.',
            'Name.max' => 'Name must not exceed 80 characters.',

            'Price.required' => 'Price field cannot be empty.',

            'Quantity.required' => 'Quantity field cannot be empty.',
            
            'Image.required' => 'Image field cannot be empty.',
        ]);

        $file = $request->file('Image');
        $extension = $file->getClientOriginalExtension();
        $imagename = time().'.'.$extension;
        $file->move(public_path('/images'),$imagename);

        $data = Barang::find($request->id);
        $data->category=$request->Category;
        $data->name=$request->Name;
        $data->price=$request->Price;
        $data->quantity=$request->Quantity;
        $data->image=$file;
        $data->save();
        return redirect('get-items');
    }

    public function list(){
        $data = Barang::all();
        return view('editBarang',['members'=>$data]);
    }

    public function delete($id){
        $data = Barang::find($id);
        $data->delete();
        return redirect('get-items');
    }
}
