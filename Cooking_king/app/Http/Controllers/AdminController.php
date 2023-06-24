<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class AdminController extends Controller
{
    public function errors(){
        return view('errors.404');
    }
    public function loginAdmin()
    {
        // dd(bcrypt('Nhập mật khẩu của bạn'));
      //kiem tra xem id da ton tai hay chua
        if (Auth()->check()) {
            return redirect()->route('statistical.index');
        }
        else{
            return view('login');
        }
        
    }

    public function registerAdmin()
    {
        return view('register');
    }

    public function logout()
    {

        Auth::logout();
        return redirect()->route('admin.login');
    }
   

    public function postLoginAdmin(Request $request)
    {
        try {
            DB::beginTransaction();
           
            $remember = $request->has('remember_me') ? true : false;
            //neu khop vs tk mk trong db moi cho vao trang home
            if (Auth::attempt([
                'email' => $request->email,
                'password' => $request->password
            ], $remember)) {
                DB::commit();
                return redirect()->route('statistical.index');
            }
            
            
           
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . ' --- Line : ' . $exception->getLine());
        }
      
       

    }
}
