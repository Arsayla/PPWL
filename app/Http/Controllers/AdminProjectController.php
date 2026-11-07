<?php
namespace App\Http\Controllers;
use App\Models\{Project,Category};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class AdminProjectController extends Controller {
 public function index(){ $projects=Project::with('category')->latest()->paginate(10); return view('admin.projects.index',compact('projects')); }
 public function create(){ $categories=Category::orderBy('name')->get(); return view('admin.projects.create',compact('categories')); }
 public function store(Request $request){
  $data=$request->validate(['name'=>'required|max:255','category_id'=>'required|exists:categories,id','description'=>'nullable|string','status'=>'required|in:published,draft','thumbnail'=>'nullable|image|mimes:jpg,jpeg,png,webp|max:2048|dimensions:min_width=500']);
  if($request->hasFile('thumbnail')) $data['thumbnail']=$request->file('thumbnail')->store('projects/thumbnails','public');
  Project::create($data); return redirect()->route('admin.projects.index')->with('success','Project berhasil ditambahkan.');
 }
 public function edit(Project $project){ $categories=Category::orderBy('name')->get(); $project->load('images'); return view('admin.projects.edit',compact('project','categories')); }
 public function update(Request $request,Project $project){
  $data=$request->validate(['name'=>'required|max:255','category_id'=>'required|exists:categories,id','description'=>'nullable|string','status'=>'required|in:published,draft','thumbnail'=>'nullable|image|mimes:jpg,jpeg,png,webp|max:2048|dimensions:min_width=500']);
  if($request->hasFile('thumbnail')) { if($project->thumbnail) Storage::disk('public')->delete($project->thumbnail); $data['thumbnail']=$request->file('thumbnail')->store('projects/thumbnails','public'); }
  $project->update($data); return redirect()->route('admin.projects.index')->with('success','Project berhasil diperbarui.');
 }
 public function destroy(Project $project){
  if($project->thumbnail) Storage::disk('public')->delete($project->thumbnail);
  foreach($project->images as $img) Storage::disk('public')->delete($img->image);
  $project->delete(); return back()->with('success','Project berhasil dihapus.');
 }
}