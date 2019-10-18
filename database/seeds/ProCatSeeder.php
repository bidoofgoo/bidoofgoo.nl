<?php

use Illuminate\Database\Seeder;

class ProCatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->add(1, [8, 11]);
        $this->add(2, [4, 7]);
        $this->add(3, [5, 6]);
        $this->add(4, [5, 6]);
        $this->add(5, [9, 11, 13]);
        $this->add(6, [9, 11, 12]);
        $this->add(7, [1, 7]);
        $this->add(8, [4, 7]);
        $this->add(9, [1]);
        $this->add(10, [9, 11, 13]);
        $this->add(11, [9, 8]);
        $this->add(12, [1, 2, 3, 11, 12]);
        $this->add(13, [9, 11, 12]);
        $this->add(14, [9, 11, 12]);
        $this->add(15, [9, 11, 13]);
        $this->add(16, [4, 11]);
    }

    public function add($project, $tags)
    {
      foreach ($tags as $tag) {
         DB::table('procatlink')->insert([
            'project_id' => $project,
            'category_id' => $tag
         ]);
      }
   }
}
