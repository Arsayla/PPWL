```php
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewControllers;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminProjectController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ProjectGalleryController;
use App\Http\Controllers\AuthController;
use App\Models\Project;

Route::get('/', function () {
    $projects = Project::with('category')
        ->where('status', 'published')
        ->latest()
        ->take(3)
        ->get();

    return view('home', compact('projects'));
})->name('home');

Route::get('/about', fn () => view('about'))->name('about');

Route::get('/education', fn () => view('education'))->name('education');

Route::get('/projects', function () {
    return view('projects', [
        'projects' => Project::with(['category', 'images'])
            ->where('status', 'published')
            ->latest()
            ->get()
    ]);
})->name('projects');

// Halaman daftar post.
Route::get('/newpost', [NewControllers::class, 'index'])
    ->name('newpost');

// Autentikasi admin.
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.process');
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

// Semua URL admin wajib login dan memiliki role admin.
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'admin'])
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('/projects', AdminProjectController::class);

        Route::get('/skills', [SkillController::class, 'index'])
            ->name('skills.index');

        Route::get('/skills/{skill}/edit', [SkillController::class, 'edit'])
            ->name('skills.edit');

        Route::put('/skills/{skill}', [SkillController::class, 'update'])
            ->name('skills.update');

        // Upload gambar galeri.
        Route::post(
            '/projects/{project}/gallery',
            [ProjectGalleryController::class, 'store']
        )->name('projects.gallery.store');

        // Mengubah caption gambar galeri.
        Route::put(
            '/projects/{project}/gallery/{image}',
            [ProjectGalleryController::class, 'updateCaption']
        )->name('projects.gallery.caption');

        // Menghapus gambar galeri.
        Route::delete(
            '/projects/{project}/gallery/{image}',
            [ProjectGalleryController::class, 'destroy']
        )->name('projects.gallery.destroy');
    });
```