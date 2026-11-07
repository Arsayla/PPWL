<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Project extends Model {
 protected $fillable=['category_id','name','description','thumbnail','status'];
 public function category(){ return $this->belongsTo(Category::class); }
 public function images(){ return $this->hasMany(ProjectImage::class)->orderBy('sort_order'); }
}