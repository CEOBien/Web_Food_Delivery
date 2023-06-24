<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Category;

use App\Models\User;
use Exception;
use GuzzleHttp\Promise\Create;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    private $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function loginUser()
    {
      
        if (Auth()->check()) {
            
            return redirect()->to('home');
        }
        return view('login');
    }
    // show login interface
    public function index()
    {
       
        $categorysLimit = Category::where('parent_id', 0)->take(3)->get();
        return view('login.login', compact('categorysLimit'));
    }
    public function checkEmail(Request $request)
    {
        if($request->get('email'))
        {
            $email = $request->get('email');
            $data  = DB::table("users")
                ->where('email', $email)
                ->count();
            if($data > 0)
            {
                echo 'not_unique';
            }
            else
            {
                echo 'unique';
            }
        }
       
       
    }

    public function register(Request $request)
    {
       
        
        
        try {
            DB::beginTransaction();
            $dataRegister = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ];
                DB::commit();
                if(!empty($dataRegister) ){
                    $this->user->create($dataRegister);
                    
                }
            
           
            return redirect()->route('index')->with('success', 'register success');
            
            
            
           
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . ' --- Line : ' . $exception->getLine());
        }
        
       
    }



    public function login(Request $request)
    {
        
        try {
            DB::beginTransaction();
           
            $remember = $request->has('remember_me') ? true : false;
          
            if (Auth::attempt([
                'email' => $request->email,
                'password' => $request->password
            ], $remember)) {

                DB::commit();
                return redirect()->route('home');
            }else{
                
                return redirect()->back()->with('thongbaokhancap', 'username or password incorrect');
            }
            
            
           
        } catch (Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . ' --- Line : ' . $exception->getLine());
        }

    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
