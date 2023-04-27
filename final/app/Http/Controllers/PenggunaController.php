<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class PenggunaController extends Controller
{
    public function getValidate() {
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
        return redirect('index');
    }
    public function getLogin() {
         return view('loginUser');
    }
    
        public function Userlogin(Request $request) {
            $request->validate([
                'Name' => 'required',
                'Email' => 'required|regex:/(.*)@gmail.com/',
                'Password' => 'required|min:6|max:12',
                'Phone' => 'required|regex:/^08/|min:9|max:12',
            ]);
            // auth
            $infoSession = [
                'name' => $request->Name,
                'email' => $request->Email,
                'password' => $request->Password,
                'phone' => $request->Phone,
            ];

            Session::put('namePerson',$request->Name);
            
            // if($request->Name == 'Alex Kurniawan' && $request->Email == 'admin123@gmail.com'
            // && $request->Password == 'adminAlex' && $request->Phone == '081234567891'){
            //     return redirect('get-items')->with('success','Login Successful');
            // }

            // if(Auth::guard('pengguna')->attempt($infoSession)){
            //     return redirect('get-items-users')->with('success','Login Successful');
            // }
            if(Auth::guard('pengguna')->attempt($infoSession)){
                dd('berhasil login');
                return redirect('get-items-users');
            }
            else{
                dd('tidak berhasil login');
                return redirect('loginUser')->withErrors('Invalid username and password');
            }
        }
    
    public function authentication(Request $request){
        $request->validate([
            'Name' => 'required',
            'Email' => 'required|regex:/(.*)@gmail.com/',
            'Password' => 'required|min:6|max:12',
            'Phone' => 'required|regex:/^08/|min:9|max:12',
        ]);
    }
}
