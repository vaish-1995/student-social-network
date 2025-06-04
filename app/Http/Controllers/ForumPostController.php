<?php

namespace App\Http\Controllers;

use App\Models\ForumPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ForumPostController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $posts = ForumPost::with('user')->latest()->paginate(10);
        return view('forum.index', compact('posts'));
    }

    public function create()
    {
        return request()->ajax() 
            ? view('forum.form')
            : view('forum.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validateRequest($request);
        $validated['user_id'] = Auth::id();

        ForumPost::create($validated);

        return $request->ajax()
            ? response()->json(['success' => true, 'message' => 'Post created successfully'])
            : redirect()->route('forum.index')->with('success', 'Post created successfully');
    }

    public function edit(ForumPost $forum)
    {
        $this->authorize('update', $forum);

        return request()->ajax()
            ? view('forum.form', ['forum' => $forum])
            : view('forum.edit', compact('forum'));
    }

    public function update(Request $request, ForumPost $forum)
    {
        $this->authorize('update', $forum);

        $validated = $this->validateRequest($request);
        $forum->update($validated);

        return $request->ajax()
            ? response()->json(['success' => true, 'message' => 'Post updated successfully'])
            : redirect()->route('forum.index')->with('success', 'Post updated successfully');
    }

    public function destroy(ForumPost $forum)
    {
        $this->authorize('delete', $forum);
        
        $forum->delete();

        return request()->ajax()
            ? response()->json(['success' => true, 'message' => 'Post deleted successfully'])
            : redirect()->route('forum.index')->with('success', 'Post deleted successfully');
    }

    /**
     * Validate the request based on language selection
     */
    protected function validateRequest(Request $request): array
    {
        $rules = [
            'language' => 'required|in:en,fr'
        ];

        if ($request->language === 'en') {
            $rules += [
                'title_en' => 'required|string|max:255',
                'content_en' => 'required|string',
                'title_fr' => 'nullable|string|max:255',
                'content_fr' => 'nullable|string'
            ];
        } else {
            $rules += [
                'title_fr' => 'required|string|max:255',
                'content_fr' => 'required|string',
                'title_en' => 'nullable|string|max:255',
                'content_en' => 'nullable|string'
            ];
        }

        return $request->validate($rules);
    }
}