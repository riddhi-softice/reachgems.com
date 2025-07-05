<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Address;
use App\Models\Orders;
use Illuminate\Support\Facades\Http;
use DB;

class OrderController extends Controller
{
    /*public function addOrder(Request $request, $productId)
    {
        $uid = auth()->id();
        $data['user_details'] = User::with('address')->where('id',$uid)->first();
        $data['product_details'] = Product::where('id',$productId)->select('id','name','price')->first();
        
        return view('web.order.add_order', compact('data'));
    }*/
    
    public function addOrder(Request $request, $productId)
    {
        $uid = auth()->id();
        $user = User::with('address')->where('id',$uid)->first();
        // $data['product_details'] = Product::where('id',$productId)->select('id','name','price')->first();

        $ip = request()->ip();
        $country = 'Unknown';
        try {
            $response = Http::timeout(1)->get("http://ip-api.com/json/{$ip}?fields=status,country");
            if ($response->ok() && $response['status'] === 'success') {
                $country = $response['country'];
            }
        } catch (\Exception $e) {}
        
        $isIndia = strtolower($country) === 'india';
        $usdRate = DB::table('common_settings')->where('setting_key', 'USD_price')->value('setting_value') ?? 85;

        $product = Product::where('id',$productId)->select('id','name','price')->first();
        $price = $isIndia ? round($product->price * $usdRate, 2) : $product->price ;
        $product->display_price = $price;
        $currency = $isIndia ? 'INR' : 'USD';
        $amount = intval($price * 100); // Razorpay expects amount in paise/cents

        $data = [
            'product_details' => $product,
            'user_details' => $user,
            'currency' => $currency,
            'amount' => $amount,
            'country' => $country,
        ];
        return view('web.order.add_order', compact('data'));
    }

    public function placeOrder(Request $request)  
    {
        // dd($request->all());
        $uid = auth()->id();
        $user = User::where('id',$uid)->first();
        if (!is_null($user)) {
           
            $input = [
                'name' => $request->name,
                'last_name' => $request->last_name,
                'phone' => $request->phone,
            ];
            $user->update($input);
        }
       
        $input1= [
            'street' => $request->street,
            'city' => $request->city,
            'state' => $request->state,
            'country' => $request->country,
            'postal_code' => $request->postal_code,
        ];
        $address = Address::where('user_id',$uid)->first();
        if (!is_null($address)) {
            $address->update($input1);
        }else {
            $input1['user_id'] = $uid;
             Address::create($input1);
        }

        $product = Product::where('id',$request->product_id)->first();
        if (!is_null($product)) {
           
            $input2 = [
                'user_id' => $uid,
                'product_id' => $request->product_id,
                'total' => $request->total,
                'payment_method' => "COD",
                'order_note' => $request->order_note,
            ];
            Orders::create($input2);
        }
        return redirect('/')->with('success', 'Order successfully.');
    }

    public function orderHistory(Request $request)
    {
        $uid = auth()->id();
        $data['order_history'] = Orders::with(['product','product.firstImage'])->where('user_id',$uid)->latest()->get();
        
        return view('web.order.order_history', compact('data'));
    }
    
    public function track()
    {
        $ip = request()->ip();
        $country = 'Unknown';
        try {
            $response = Http::timeout(1)->get("http://ip-api.com/json/{$ip}?fields=status,country");

            if ($response->ok() && $response['status'] === 'success') {
                $country = $response['country'];
            }
        } catch (\Exception $e) {
            // Fail silently or log if needed
        }
        dd($country);
        return view('web.track', compact('country'));
    }

}
