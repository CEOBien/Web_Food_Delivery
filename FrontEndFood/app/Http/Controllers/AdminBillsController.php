<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Order_Items;
use App\Models\Orders;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
class AdminBillsController extends Controller
{
    private $customer, $order, $order_Items;
    public function __construct(Customer $customer, Orders $order,Order_Items $order_Items )
    {
        $this->customer = $customer;
        $this->order = $order;
        $this->order_Items =$order_Items;
    }
    public function index()
    {
        if(!empty(session()->get('cart')))
        {
            $carts = session()->get('cart');
            $categorysLimit = Category::where('parent_id', 0)->get();
            return view('bill.bill', compact('categorysLimit', 'carts'));
        }
        else{
            return redirect()->route('home');
        }
        
    }
    public function store(Request $request)
    {
        $carts = session()->get('cart');
        $total = 0;
        foreach($carts as $cartsTotal)
        {
            $total += $cartsTotal['price'] * $cartsTotal['quantity'];
        }
       
        
        $EnterCustomer = [
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'message' =>$request->message
        ];
        $customer = $this->customer->create($EnterCustomer);
        
        if(!empty(auth()->id()))
        {
            $orders = [
                'user_id' => auth()->id(),
                'customer_id' => $customer->id,
                'status' => 1,
                'total' => $total + 2

            ];
            $order = $this->order->create($orders);
        }else{
            $order = [
                'customer_id' => $customer->id,
                'status' => 1,
                'total' => $total + 2
            ];
            $order= $this->order->create($order);

        }
     
        foreach($carts as $key => $cartItems)
        {
            
            $orderItem = [
                'order_id' => $order->id,
                'product_id' => $key,
                'quantity' => $cartItems['quantity'],
                'name_food' => $cartItems['name'],
                
            ];
            $this->order_Items->create($orderItem);
  
        }
        $carts = session()->forget('cart');
        return redirect()->route('home')->with('info', 'Order Success.Products will be delivered to you within 15 to 30 minutes');

    }
    public function error(){
        return view('error.404');
    }
}
