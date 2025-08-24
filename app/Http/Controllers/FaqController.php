<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\FaqCategory;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categories = FaqCategory::all();
        $selectedCategory = $request->input('category');

        $faqsQuery = Faq::with('category');

        if ($selectedCategory) {
            $faqsQuery->where('category_id', $selectedCategory);
        }

        $faqs = $faqsQuery->get()->groupBy('category.name');

        return view('faq', compact('faqs', 'categories', 'selectedCategory'));
    }

    public function adminIndex()
    {
        $faqs = Faq::with('category')->orderBy('category_id')->get();
        $categories = FaqCategory::all();
        return view('admin.faqIndex', compact('faqs', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = FaqCategory::all();
        return view('admin.faqCreate', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:faq_categories,id',
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        Faq::create($request->all());

        return redirect()->route('faq.adminIndex')->with('status', 'FAQ toegevoegd.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faq $faq)
    {
        $categories = FaqCategory::all();
        return view('admin.faqEdit', compact('faq', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Faq $faq)
    {
        $request->validate([
            'category_id' => 'required|exists:faq_categories,id',
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        $faq->update($request->all());

        return redirect()->route('faq.adminIndex')->with('status', 'FAQ bijgewerkt.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->route('faq.adminIndex')->with('status', 'FAQ verwijderd.');
    }
}