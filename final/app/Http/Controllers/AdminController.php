<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function getValidate() {
        return view('loginUser');
    }

    public function login1(Request $request){
        $request->validate([
            'Name' => 'required|min:3|max:40',
            'Email' => 'required|regex:/(.*)@gmail.com/',
            'Password' => 'required|min:6|max:12',
            'Phone' => 'required|regex:/^08/|min:9|max:12'
        ]);

        $infoSession = [
            'name' => $request->Name,
            'email' => $request->Email,
            'password' => $request->Password,
            'phone' => $request->Phone,
        ];
        // Session::put('namePerson',$request->Name);
        // $data = Admin::find($id);
        // dd($data);
        // if($data->role == 'admin'){
        //     return redirect('get-items')->with('success','Login Successful');
        // }

        if($request->Name == 'Alex Kurniawan' && $request->Email == 'admin123@gmail.com'
        && $request->Password == 'adminAlex' && $request->Phone == '081234567891'){
            return redirect('get-items')->with('success','Login Successful');
        }

        else if(Auth::guard('pengguna')->attempt($infoSession,$request->remmeber)){
            return redirect('get-items-users')->with('success','Login Successful');
        }
        else{
            return redirect('get-items-users');
        }
    //    return back()->withErrors([
    //     'Email' => 'The provided credentials does not match our records',
    //    ]);
    }

    public function _construct(){
        $this->middleware('guest:admin',['except'=>'logout']);
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }


    public function getValidateUser() {
        return view('createUser');
    }
      
    public function postValidate(Request $request) {
        $request->validate([
            'Name' => 'required|min:5|max:40',
            'Email' => 'required|regex:/(.*)@gmail.com/i',
            'Password' => 'required|min:6|max:12',
            'Phone' => 'required|regex:/^08/|min:9|max:12'
        ], [
            'Name.required' => 'Name field cannot be empty.',
            'Name.min' => 'Name must contain at least 5 characters or more.',
            'Name.max' => 'Name must not exceed 40 characters.',

            'Email.required' => 'Email field cannot be empty.',
            'Email.regex' => 'Email must have @gmail.com.',

            'Password.required' => 'Password field cannot be empty.',
            'Password.min' => 'Password must contain at least 6 characters or more.',
            'Password.max' => 'Password must not exceed 12 characters.',
            
            'Phone.required' => 'Phone field cannot be empty.',
            'Phone.regex' => 'Phone Number must be start by 08',
            'Phone.min' => 'Phone Number must contain 9-12 numbers',
            'Phone.max' => 'Phone Number must contain 9-12 numbers'
        ]);

        Pengguna::create([
            'Name' => $request->Name,
            'Email' => $request->Email,
            'Password' => $request->Password,
            'Phone' => $request->Phone,
        ]);
        return redirect('get-items-users');
    }
}
