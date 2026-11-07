<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Technology;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('admin.dashboard', [
            'published' => Project::where('status', 'published')->count(),
            'draft' => Project::where('status', 'draft')->count(),
            'totalProjects' => Project::count(),
            'totalCategories' => Category::count(),
            'totalTechnologies' => Technology::count(),
            'totalSkills' => Skill::count(),
            'totalPosts' => Post::count(),
            'topSkills' => Skill::orderByDesc('level')->take(5)->get(),
            'categories' => Category::withCount('projects')->orderByDesc('projects_count')->get(),
            'latestProjects' => Project::with('category')->latest()->take(5)->get(),
        ]);
    }
}
