<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\{Category,Skill,Technology};
class PortfolioSeeder extends Seeder {
 public function run(): void {
  foreach(['Web Development','UI/UX Design','Mobile Development'] as $name) Category::firstOrCreate(['name'=>$name]);
  foreach([['Laravel',90],['PHP',85],['UI/UX Design',80],['Java',75],['MySQL',80]] as [$name,$level]) Skill::firstOrCreate(['name'=>$name],['level'=>$level]);
  foreach(['Laravel','PHP','MySQL','Figma','Java'] as $name) Technology::firstOrCreate(['name'=>$name]);
  $web=Category::where('name','Web Development')->first();
  Project::firstOrCreate(['name'=>'Portfolio Website'],['category_id'=>$web->id,'description'=>'Website portfolio sederhana menggunakan Laravel dan Blade.','status'=>'published']);
  Project::firstOrCreate(['name'=>'Photo Studio Website'],['category_id'=>$web->id,'description'=>'Website pemesanan studio foto dengan fitur booking dan pengelolaan data.','status'=>'draft']);
 }
}