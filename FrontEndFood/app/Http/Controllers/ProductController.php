<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use App\Traits\SuccessModelTrait;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
        private $product;
        public function __construct(Product $product)
        {
            $this->product = $product;
        }
        
        
    public function index()
    {
        $categorysLimit = Category::where('parent_id', 0)->take(6)->get();
       
        return view('product.shoppingcart.cart', compact('categorysLimit'));
    }

    public function search(Request $request)
    {
        $categorysLimit = Category::where('parent_id', 0)->take(10)->get();
        $categorys = Category::where('parent_id', 0)->get();
       
        $products = Product::where('name','like', '%' .$request->key. '%' )
                            ->orwhere('price', $request->key)
                            ->get();
        
                  
        if(!empty($request->key) )
        {
            return view('search.searchProduct', compact('products', 'categorys', 'categorysLimit'));
        }
        else{
            return redirect()->route('home')->with('info', 'Asking enter key');
            
        }
        
    }


    public function addToCart($id)
    {
        
        $product = Product::find($id);
        //moi lan request se duoc goi lai thang session de luu tru data
        $cart = session()->get('cart');
        if(isset($cart[$id]))
        {
            $cart[$id]['quantity'] = $cart[$id]['quantity'] + 1;
        }else{
            $cart[$id] = [
                'image' => $product->feature_image_path,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1
                
            ];
        }

       
        //dung session de luu tru gia tri dung dc voi nhieu bang
        session()->put('cart', $cart);
        //thanh cong se tra ve thong bao
        
        return response()->json([
            'code' => 200,
            'message' => 'success'
        ], 200);
        
        
        
    }
    public function showCart()
    {
        if(!empty(session()->get('cart')))
        {
            $carts = session()->get('cart');
       
            $categorysLimit = Category::where('parent_id', 0)->take(6)->get();
            return view('product.shoppingcart.cart', compact('carts', 'categorysLimit'));
        }
        else{
            return redirect()->route('home')->with('info', 'Have not product');
            
            
        }
        
    }

    public function updateCart(Request $request)
    {
        if($request->id && $request->quantity)
        {
            $carts = session()->get('cart');
            $carts[$request->id]['quantity'] = $request->quantity;
            session()->put('cart', $carts);
            $carts = session()->get('cart');
            $cartComponent = view('product.components.show_cart', compact('carts'))->render();
            return response()->json(['cart_components' => $cartComponent, 'code' => 200], 200);
        }
    }
    public function deleteCart(Request $request)
    {
        if($request->id )
        {
            $carts = session()->get('cart');
            unset($carts[$request->id]);
            session()->put('cart', $carts);
            $carts = session()->get('cart');
            $cartComponent = view('product.components.show_cart', compact('carts'))->render();
            return response()->json(['cart_components' => $cartComponent, 'code' => 200], 200);
        }
    }
    public function productDetail($id)
    {
        $sliders = Slider::latest()->get();
        $categorysLimit = Category::where('parent_id', 0)->take(6)->get();
        $categorys = Category::where('parent_id', 0)->get();
        $products = Product::take(6)->get();//take dung de lay san pham
        $productsDetail = Product::find($id);
        $productsRecommend = Product::latest('view_count', 'desc')->take(9)->get();
        return view('product.productDetail.detail',compact('categorysLimit', 'categorys', 'products', 
        'productsRecommend', 'sliders', 'productsDetail'));
    }
}
