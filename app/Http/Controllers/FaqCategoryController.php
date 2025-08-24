<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\FaqCategory;
use Illuminate\Http\Request;

class FaqCategoryController extends Controller
{
    public function create()
    {
        return view('admin.faqCategoryCreate');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:faq_categories,name|max:255',
        ]);

        FaqCategory::create([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('faq.adminIndex')->with('status', 'Categorie aangemaakt.');
    }

    public function index()
    {
        $categories = FaqCategory::all();
        $faqs = Faq::with('category')->orderBy('category_id')->get();
        return view('admin.faqIndex', compact('faqs', 'categories'));
    }

    public function edit(FaqCategory $category)
    {
        return view('admin.faqCategoryEdit', compact('category'));
    }

    public function update(Request $request, FaqCategory $category)
    {
        $request->validate(['name' => 'required|string|max:255']);
        $category->update(['name' => $request->name]);

        return redirect()->route('faq.adminIndex')->with('status', 'Categorie bijgewerkt.');
    }

    public function destroy(FaqCategory $category)
    {
        $category->delete();
        return redirect()->route('faq.adminIndex')->with('status', 'Categorie verwijderd.');
    }
}
