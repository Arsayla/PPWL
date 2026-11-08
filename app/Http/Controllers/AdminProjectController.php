<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Category;
use App\Models\ProjectImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminProjectController extends Controller
{
    // Menampilkan daftar project
    public function index()
    {
        $projects = Project::with('category')
            ->latest()
            ->paginate(10);

        return view('admin.projects.index', compact('projects'));
    }

    // Menampilkan form tambah project
    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('admin.projects.create', compact('categories'));
    }

    // Menyimpan project baru
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'status' => 'required|in:published,draft',
            'thumbnail' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
                'dimensions:min_width=500',
            ],
        ]);

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')
                ->store('projects/thumbnails', 'public');
        }

        $project = Project::create($data);

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Project berhasil ditambahkan.');
    }

    // Menampilkan form edit project
    public function edit(Project $project)
    {
        $categories = Category::orderBy('name')->get();

        $project->load('images');

        return view(
            'admin.projects.edit',
            compact('project', 'categories')
        );
    }

    // Memperbarui project
    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
            'status' => 'required|in:published,draft',
            'thumbnail' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
                'dimensions:min_width=500',
            ],
        ]);

        if ($request->hasFile('thumbnail')) {
            if ($project->thumbnail) {
                Storage::disk('public')->delete($project->thumbnail);
            }

            $data['thumbnail'] = $request->file('thumbnail')
                ->store('projects/thumbnails', 'public');
        }

        $project->update($data);

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'Project berhasil diperbarui.');
    }

    // Menghapus project
    public function destroy(Project $project)
    {
        if ($project->thumbnail) {
            Storage::disk('public')->delete($project->thumbnail);
        }

        foreach ($project->images as $img) {
            Storage::disk('public')->delete($img->image);
        }

        $project->delete();

        return back()->with(
            'success',
            'Project berhasil dihapus.'
        );
    }

    // Memperbarui caption gambar galeri
    public function updateCaption(Request $request, ProjectImage $image)
    {
        $request->validate([
            'caption' => 'nullable|string|max:255',
        ]);

        $image->update([
            'caption' => $request->caption,
        ]);

        return back()->with(
            'success',
            'Caption berhasil diperbarui.'
        );
    }
}