<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FAQ;
use Illuminate\Support\Str;

class FAQController extends Controller
{
    public function index()
    {
        $faqs = FAQ::latest()->get();
        return view('admin.faqs.index', compact('faqs'));
    }

    public function create()
    { 
        return view('admin.faqs.create');
    }
   
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required',
        ]);

        $faq = FAQ::create([
            'question' => $request->question,
            'answer' => $request->answer,
        ]);

        return redirect()->route('faqs.index')->with('success', 'FAQ created successfully.');
    }
    
    public function edit(FAQ $faq)
    {
        return view('admin.faqs.edit', compact('faq'));
    }

    public function update(Request $request, FAQ $faq)
    {        
        $input['question'] = $request->question;
        $input['answer'] = $request->answer;
        $faq->update($input);

        return redirect()->route('faqs.index')->with('success', 'FAQ updated successfully.');
    }

    public function destroy_faqs(FAQ $faq)
    {
        $faq->delete();
        return redirect()->route('faqs.index')->with('success', 'FAQ deleted successfully.');
    }

}