<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Post;
use Faker\Core\Number;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CartController extends Controller
{
    public function postCart(){
        $carts = Cart::where('user_id',Auth::id())->get();
         return view('user.layouts.credit',compact('carts'));

    }
    public function orders(){
        $carts = Cart::where('user_id',Auth::id())->get();
         return view('user.layouts.order',compact('carts'));

    }
    public function addToCart(Request $request){

        $product_id = $request->product_id;
        $product_quantity = 1;
        $user_id = Auth::id();

        if (Auth::check()) {
            $prooduct = Post::where('id',$product_id)->exists();
            if ($prooduct) {
                if (Cart::where('post_id',$product_id)->where('user_id',$user_id)->exists()) {
                      return response()->json(['msg'=>'Product in your Cart already']);
                }else {
                    Cart::create([
                        'user_id'=>$user_id,
                        'post_id'=>$product_id,
                        'quantity'=>$product_quantity,
                    ]);

                    $product_name = Post::findOrFail($product_id);

                    return response()->json(['msg'=>$product_name->name.'Successfully added to your cart']);

                }
            }else {
                # code...
                return response()->json(['msg'=>'Product Not Found']);

            }
        }
    }


    public function update(Request $request)
    {
        if (Auth::check()) {
            # code...
            if (Cart::where('id',$request->id)->exists()) {
                # code...
                $cart = Cart::where('id',$request->id)->first();
                $cart->update([
                    'quantity'=>$request->quantity,
                ]);
            }
            return response()->json(['msg'=>'Cart Update']);
        }
    }

    public function destroy($id)
    {
        $cart = Cart::where(['id'=>$id, 'user_id'=>Auth::id()])->first();
        $cart->delete();
        return redirect(route('user.shopping.cart'))->with('success', 'Cart Deleted Successfully');
    }

}
