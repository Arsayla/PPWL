```php
<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectGalleryController extends Controller
{
    // Mengunggah gambar gallery project.
    public function store(Request $request, Project $project)
    {
        $request->validate([
            'images' => [
                'required',
                'array',
                'max:10',
            ],

            'images.*' => [
                'required',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:4096',
                'dimensions:min_width=800',
            ],
        ]);

        // Memastikan jumlah gambar tidak melebihi 10.
        if (
            $project->images()->count() +
            count($request->file('images')) > 10
        ) {
            return back()->withErrors([
                'images' => 'Maksimal 10 gambar untuk setiap project.',
            ]);
        }

        // Menyimpan setiap gambar ke storage.
        foreach ($request->file('images') as $index => $file) {
            $path = $file->store(
                'projects/gallery',
                'public'
            );

            $project->images()->create([
                'image' => $path,
                'caption' => null,
                'sort_order' => $project->images()->count(),
            ]);
        }

        return back()->with(
            'success',
            'Gambar gallery berhasil diunggah.'
        );
    }

    // Memperbarui caption gambar gallery.
    public function updateCaption(
        Request $request,
        Project $project,
        ProjectImage $image
    ) {
        // Memastikan gambar milik project yang sesuai.
        abort_if($image->project_id !== $project->id, 404);

        $data = $request->validate([
            'caption' => 'nullable|string|max:255',
        ]);

        $image->update([
            'caption' => $data['caption'],
        ]);

        return back()->with(
            'success',
            'Caption berhasil diperbarui.'
        );
    }

    // Menghapus gambar gallery.
    public function destroy(Project $project, ProjectImage $image)
    {
        // Memastikan gambar milik project yang sesuai.
        abort_if($image->project_id !== $project->id, 404);

        // Menghapus file gambar dari storage.
        Storage::disk('public')->delete($image->image);

        // Menghapus data gambar dari database.
        $image->delete();

        return back()->with(
            'success',
            'Gambar gallery berhasil dihapus.'
        );
    }
}
```