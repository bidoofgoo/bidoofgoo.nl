<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
   /**
   * Run the database seeds.
   *
   * @return void
   */
   public function run()
   {
      $this->add('WebVR', '#328AEF'); // 1
      $this->add('Oculus Rift', '#404040'); // 2
      $this->add('Gear Vr', '#505040'); // 3
      $this->add('Art', 'green'); // 4
      $this->add('Video', 'red'); // 5
      $this->add('Animation', '#D82998'); // 6
      $this->add('Spooky', '#68319B'); // 7
      $this->add('Game', '#AD60FF'); // 8
      $this->add('Website', '#E2B64D'); // 9
      $this->add('Misc', 'grey'); // 10
      $this->add('Dutch only', '#FF6A00'); // 11
      $this->add('School', '#0D1D5B'); // 12 #26B4B5
      $this->add('Jobs', '#fe98a3'); // 13
   }

   public function add($name, $color, $desc = ""){
      DB::table('projectcategories')->insert([
         'name' => $name,
         'color' => $color,
         'description' => $desc
      ]);
   }
}
