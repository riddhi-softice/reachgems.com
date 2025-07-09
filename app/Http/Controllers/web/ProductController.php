<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\SubCategory;
use DB;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    public function new()
    {
        $ip = request()->ip();
        $country = 'Unknown';

        try {
            $response = Http::timeout(1)->get("http://ip-api.com/json/{$ip}?fields=status,country");
            if ($response->ok() && $response['status'] === 'success') {
                $country = $response['country'];
            }
        } catch (\Exception $e) {
            // Optional: log or ignore
        }
        // dd($country);
        $isIndia = strtolower($country) === 'india';

        // Step 2: Get USD conversion rate from common_settings
        $usdRate = DB::table('common_settings')->where('setting_key', 'USD_price')->value('setting_value');
        $usdRate = floatval($usdRate); // Ensure it's numeric

        // Get products and modify price if not in India
        // Step 3: Fetch products and apply price conversion if needed
        $products = Product::with('images')->latest()->take(8)->get()->map(function ($product) use ($isIndia, $usdRate) {
            $product->display_price = $isIndia ? $product->price : $product->price * $usdRate;
            return $product;
        });
        
        $data['all_products'] = $products;
        $data['country'] = $country; // Optional: show country on frontend

        return view('web.index', compact('data'));
    }
    
    public function home_page()
    { 
        $ip = request()->ip();
        $country = 'Unknown';

        try {
            $response = Http::timeout(1)->get("http://ip-api.com/json/{$ip}?fields=status,country");
            if ($response->ok() && $response['status'] === 'success') {
                $country = $response['country'];
            }
        } catch (\Exception $e) { }
        $isIndia = strtolower($country) === 'india';

        // Step 2: Get USD conversion rate from common_settings
        $usdRate = DB::table('common_settings')->where('setting_key', 'USD_price')->value('setting_value');
        $usdRate = floatval($usdRate); // Ensure it's numeric

        // Get products and modify price if not in India
        // Step 3: Fetch products and apply price conversion if needed
        $products = Product::with('images')->latest()->take(4)->get()->map(function ($product) use ($isIndia, $usdRate) {
            $product->display_price = $isIndia ? $product->price * $usdRate : $product->price;
            return $product;
        });       

        $categories = DB::table('sub_categories')->latest()->get();
        $common_settings = DB::table('common_settings')->pluck('setting_value', 'setting_key')->toArray();
        
        $data['common_settings'] = $common_settings;
        $data['all_categories'] = $categories;
        $data['all_products'] = $products;
        $data['country'] = $country; // Optional: show country on frontend

        return view('web.index', compact('data'));
    }

    public function moreProduct(Request $request)
    {       
        $country = 'Unknown';
        $ip = $request->ip();
        try {
            $response = Http::timeout(1)->get("http://ip-api.com/json/{$ip}?fields=status,country");
            if ($response->ok() && $response['status'] === 'success') {
                $country = $response['country'];
            }
        } catch (\Exception $e) {}

        $isIndia = strtolower($country) === 'india';
        $usdRate = floatval(DB::table('common_settings')->where('setting_key', 'USD_price')->value('setting_value'));

        $categoryId = $request->query('category_id');
        if ($categoryId) {
            $products = Product::with('images')
                ->where('cat_id', $categoryId)
                ->latest()
                ->paginate(4)
                ->appends(['category_id' => $categoryId]);
        } else {
            $products = Product::with('images')->latest()->paginate(4);
        }

        // Adjust prices
        $products->getCollection()->transform(function ($product) use ($isIndia, $usdRate) {
            $product->display_price = $isIndia ? $product->price * $usdRate : $product->price;
            return $product;
        });

        $data['categories'] = SubCategory::all();
        $data['all_products'] = $products;
        $data['selected_category_id'] = $categoryId;
        $data['country'] = $country;

        return view('web.more-2', compact('data'));
    }
  
    public function more_product()
    {
        // Step 1: Detect user's country
        $ip = request()->ip();
        $country = 'Unknown';
        try {
            $response = Http::timeout(1)->get("http://ip-api.com/json/{$ip}?fields=status,country");
            if ($response->ok() && $response['status'] === 'success') {
                $country = $response['country'];
            }
        } catch (\Exception $e) {
            // Optional: log or ignore
        }
        // dd($country);
        $isIndia = strtolower($country) === 'india';

        // Step 2: Get USD conversion rate from common_settings
        $usdRate = DB::table('common_settings')->where('setting_key', 'USD_price')->value('setting_value');
        $usdRate = floatval($usdRate); // Ensure it's numeric

        // Get products and modify price if not in India
        // Step 3: Fetch products and apply price conversion if needed
        // $products = Product::with('images')->latest()->take(2)->get()->map(function ($product) use ($isIndia, $usdRate) {
        $products = Product::with('images')->latest()->paginate(2);

        $products->getCollection()->transform(function ($product) use ($isIndia, $usdRate) {
            $product->display_price = $isIndia ? $product->price * $usdRate : $product->price;
            return $product;
        });
            
        $data['categories'] = SubCategory::all();

        // Load paginated products for a selected category (optional default)
        $selectedCategoryId = request('category_id'); // e.g., from tab click
        if ($selectedCategoryId) {
            $selectedCategory = SubCategory::find($selectedCategoryId);
            $categoryProducts = Product::with('images')
                ->where('subcategory_id', $selectedCategoryId)
                ->latest()
                ->paginate(12)
                ->appends(['category_id' => $selectedCategoryId]);
        } else {
            $categoryProducts = null;
        }

        $data['selected_category_id'] = $selectedCategoryId;
        $data['category_products'] = $categoryProducts;

        // $data['categories'] = SubCategory::with(['products.images'])->get();
        $data['all_products'] = $products;
        $data['country'] = $country; // Optional: show country on frontend

        return view('web.more_product', compact('data'));
    }
  
    public function more_product_old()
    {
        $ip = request()->ip();
        $country = 'Unknown';
        try {
            $response = Http::timeout(1)->get("http://ip-api.com/json/{$ip}?fields=status,country");
            if ($response->ok() && $response['status'] === 'success') {
                $country = $response['country'];
            }
        } catch (\Exception $e) { }

        $isIndia = strtolower($country) === 'india';

        // Step 2: Get USD conversion rate from common_settings
        $usdRate = DB::table('common_settings')->where('setting_key', 'USD_price')->value('setting_value');
        $usdRate = floatval($usdRate); // Ensure it's numeric

        // Get products and modify price if not in India
        // Step 3: Fetch products and apply price conversion if needed
        $products = Product::with('images')
                    ->latest()->paginate(2)
                    ->through(function ($product) use ($isIndia, $usdRate) {
                        $product->display_price = $isIndia ? $product->price * $usdRate : $product->price;
                        return $product;
                    });

        $data['all_products'] = $products;
        $data['country'] = $country; // Optional: show country on frontend

        return view('web.more_product', compact('data'));
    }
  
    public function details_page($id)
    { 
        // Step 1: Detect user's country
        $ip = request()->ip();
        $country = 'Unknown';
        try {
            $response = Http::timeout(1)->get("http://ip-api.com/json/{$ip}?fields=status,country");
            if ($response->ok() && $response['status'] === 'success') {
                $country = $response['country'];
            }
        } catch (\Exception $e) { }
        $isIndia = strtolower($country) === 'india';

        // Step 2: Get USD conversion rate from common_settings
        $usdRate = DB::table('common_settings')->where('setting_key', 'USD_price')->value('setting_value');
        $usdRate = floatval($usdRate); // Ensure it's numeric

        $product = Product::with(['images'])->findOrFail($id);
        $product->display_price = $isIndia ? $product->price * $usdRate : $product->price;
        $product->reseller_display_price = $isIndia ? $product->reseller_price * $usdRate : $product->reseller_price;

        $categories = DB::table('sub_categories')->latest()->get();
        $brands = DB::table('brands')->latest()->get();
        $common_settings = DB::table('common_settings')->pluck('setting_value', 'setting_key')->toArray();
        $product_faq = DB::table('product_faq')->latest()->get();
        
        $data['product_faq'] = $product_faq;
        $data['common_settings'] = $common_settings;
        $data['all_categories'] = $categories;
        $data['brands'] = $brands;
        
        return view('web.product_detail', compact('product','country','data'));
    }
}