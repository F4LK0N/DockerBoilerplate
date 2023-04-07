<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function index()
    {
        $tags = Tag::latest()->paginate(5);
    
        return view('tags.index',compact('tags'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    public function create()
    {
        return view('tags.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
    
        Tag::create($request->all());
     
        return redirect()->route('tag.index')
                        ->with('success','Tag created successfully.');
    }

    public function show(Tag $tag)
    {
        return view('tags.show',compact('tag'));
    }

    public function edit(Tag $tag)
    {
        return view('tags.edit',compact('tag'));
    }

    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required',
        ]);
    
        $user->update($request->all());
    
        return redirect()->route('tags.index')
                        ->with('success','Tag updated successfully');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
    
        return redirect()->route('tags.index')
                        ->with('success','Tag deleted successfully');
    }
    
}
