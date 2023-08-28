<?php

namespace App\Http\Controllers;


use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        //get category
        $categories = Category::latest()->paginate(10000);

        //render view with posts
        return view('categories.index', compact('categories'));
    }
    public function create()
    {
        $category = Category::all();
        return view('categories.create');
    }

    public function store(Request $request)
    {
        //create post
        Category::create([
            'name'     => $request->name,
            'description'   => $request->description
        ]);

        //redirect to index
        return back()->with('status', 'Data Berhasil Disimpan!');
    }

    public function edit(string $id)
    {
        $category = Category::find($id);
        return view('categories.edit')
            ->with('categories', $category);
    }

    public function update(Request $request, string $id)
    {
        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->description = $request->input('description');
        $category->update();
        return redirect('categories/');
    }

    public function destroy(string $id)
    {
        $category = Category::find($id);
        Category::destroy($id);
        return redirect('categories/')->with('status', 'Data Berhasil Di hapus');
    }
}
