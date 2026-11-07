<?php
namespace App\Http\Controllers;
use App\Models\Skill;
use Illuminate\Http\Request;
class SkillController extends Controller {
 public function index(){ $skills=Skill::orderByDesc('level')->paginate(10); return view('admin.skills.index',compact('skills')); }
 public function edit(Skill $skill){ return view('admin.skills.edit',compact('skill')); }
 public function update(Request $request,Skill $skill){
  $data=$request->validate(['name'=>'required|string|max:100','level'=>'required|integer|min:1|max:100']);
  $skill->update($data); return redirect()->route('admin.skills.index')->with('success','Skill berhasil diperbarui.');
 }
}