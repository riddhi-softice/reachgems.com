<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use DB;

class CategoryController extends Controller
{
    public function index()
    {        
        $sub_categories = SubCategory::latest()->get();
        return view('admin.sub_categories.index', compact('sub_categories'));
    }

    public function create()
    { 
        return view('admin.sub_categories.create');
    }
   
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048', // max 2MB
        ]);
        $outputFilename = '';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $originalSizeBytes = $image->getSize();
            $originalSizeKB = $originalSizeBytes / 1024;
            // Dynamic quality based on size (optional)
            $quality = 40; // Default quality for WebP

            $imagePath = public_path('assets/images/sub_categories');
            $filenameBase = time() . '_' . rand(1000, 9999);
            $outputExtension = 'webp';
            $outputFilename = $filenameBase . '.' . $outputExtension;
            $outputFullPath = $imagePath . '/' . $outputFilename;
    
            // Make directory if it doesn't exist
            if (!file_exists($imagePath)) {
                mkdir($imagePath, 0755, true);
            }
    
            // Process and save the image as WebP
            Image::make($image->getRealPath())
                ->resize(1500, null, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })
                ->encode('webp', $quality)
                ->save($outputFullPath);
        }
        // Save to database
        SubCategory::create([
            'name' => $request->name,
            'image' => $outputFilename,
        ]);
        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }
    
    public function edit($id)
    {
        $sub_category = SubCategory::findOrFail($id);
        return view('admin.sub_categories.edit', compact(['sub_category']));
    }

    public function update(Request $request, $id)
    {
        // dd($sub_category);
        // dd($request->all());
        $sub_category = SubCategory::findOrFail($id);
        $outputFilename = '';
        if ($request->hasFile('image')) {

            // REMOVE IMAGE 
            $this->deleteImage($sub_category->image);

            $image = $request->file('image');
            $originalSizeBytes = $image->getSize();
            $originalSizeKB = $originalSizeBytes / 1024;
            // Dynamic quality based on size (optional)
            $quality = 40; // Default quality for WebP
            $imagePath = public_path('assets/images/sub_categories');
            $filenameBase = time() . '_' . rand(1000, 9999);
            $outputExtension = 'webp';
            $outputFilename = $filenameBase . '.' . $outputExtension;
            $outputFullPath = $imagePath . '/' . $outputFilename;
            // Make directory if it doesn't exist
            if (!file_exists($imagePath)) {
                mkdir($imagePath, 0755, true);
            }
            // Process and save the image as WebP
            Image::make($image->getRealPath())
                    ->resize(1500, null, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })
                    ->encode('webp', $quality)
                    ->save($outputFullPath);
            $input['image'] = $outputFilename;
        }
        $input['name'] = $request->name;
        $sub_category->update($input);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy_sub_categories($id)
    {
        $sub_category = SubCategory::findOrFail($id);
        $this->deleteImage($sub_category->image);  // REMOVE IMAGE 
        $sub_category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }

    protected function deleteImage($filename)
    {
        $path = 'public/assets/images/sub_categories/' . $filename;
        if (File::exists($path)) {
            File::delete($path);
        }
    }
    
}