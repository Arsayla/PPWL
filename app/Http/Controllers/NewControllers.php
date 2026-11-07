<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class NewControllers extends Controller
{
    public function index(Request $request)
    {
        $search = trim((string) $request->input('search', ''));

        $allowedPerPage = [5, 10, 25];
        $perPage = (int) $request->input('per_page', 10);

        if (!in_array($perPage, $allowedPerPage, true)) {
            $perPage = 10;
        }

        $posts = Post::query()
            ->when($search !== '', function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%');
            })
            ->orderByDesc('created_at')
            ->orderByDesc('id')
            ->paginate($perPage)
            ->withQueryString();

        return view('post.index', compact(
            'posts',
            'search',
            'perPage'
        ));
    }
}
