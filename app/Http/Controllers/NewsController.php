<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.newsCreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'published_at' => 'required|date',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('news_images', 'public');
        }

        News::create($validated);

        return redirect()->route('news.newsIndex')->with('status', 'Nieuwsitem aangemaakt.');
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        return view('showNews', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        return view('admin.newsEdit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'published_at' => 'required|date',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }
            $validated['image'] = $request->file('image')->store('news_images', 'public');
        }

        $news->update($validated);

        return redirect()->route('news.newsIndex')->with('status', 'Nieuwsitem aangepast.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }

        $news->delete();

        return redirect()->route('news.newsIndex')->with('status', 'Nieuwsitem succesvol verwijderd.');
    }

    public function newsIndex()
    {
        $newsitems = News::orderBy('published_at', 'desc')->paginate(10);
        return view('admin.newsIndex', compact('newsitems'));
    }
}
