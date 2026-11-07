<?php
namespace App\Http\Controllers;
use App\Models\{Project,ProjectImage};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class ProjectGalleryController extends Controller {
 public function store(Request $request,Project $project){
  $request->validate(['images'=>'required|array|max:10','images.*'=>'required|image|mimes:jpg,jpeg,png,webp|max:4096|dimensions:min_width=800']);
  if($project->images()->count()+count($request->file('images'))>10) return back()->withErrors(['images'=>'Maksimal 10 gambar untuk setiap project.']);
  foreach($request->file('images') as $file) $project->images()->create(['image'=>$file->store('projects/gallery','public')]);
  return back()->with('success','Gambar gallery berhasil diunggah.');
 }
 public function updateCaption(Request $request,Project $project,ProjectImage $image){
  abort_if($image->project_id!==$project->id,404);
  $data=$request->validate(['caption'=>'nullable|string|max:255']);
  $image->update($data); return back()->with('success','Caption berhasil diperbarui.');
 }
 public function destroy(Project $project,ProjectImage $image){
  abort_if($image->project_id!==$project->id,404);
  Storage::disk('public')->delete($image->image); $image->delete();
  return back()->with('success','Gambar gallery berhasil dihapus.');
 }
}