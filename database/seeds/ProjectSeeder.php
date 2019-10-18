<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProjectSeeder extends Seeder
{
   /**
   * Run the database seeds.
   *
   * @return void
   */
   public function run()
   {
      //Carbon::createFromDate($year, $month, $day, $tz);
      $this->add('Kat & Cavia RPG', 'katcavia.png', 'https://www.youtube.com/watch?v=5aRIF3BxQ_A',
         Carbon::createFromDate(2010, 10, 18));
      $this->add('Skeleton cave', 'skelcav.png', 'https://bidoofgoo.deviantart.com/art/The-Cave-626435086',
         Carbon::createFromDate(2016, 8, 6));
      $this->add('Why we hate you', 'hate.png', 'https://www.youtube.com/watch?v=vEmf__ZTKuk',
         Carbon::createFromDate(2014, 5, 16));
      $this->add('Eddsworld: Just a bit crazy REMASTERED', 'edd.png', 'https://www.youtube.com/watch?v=WnX8mijcaZc',
         Carbon::createFromDate(2016, 3, 25));
      $this->add('Ont-wikkeling.net', 'ontwikkeling.png', 'http://www.ont-wikkeling.net',
         Carbon::createFromDate(2017, 4, 1));
      $this->add('Skeleton Website NOS', 'nos.png', 'http://skeletonnos.bidoofgoo.nl',
         Carbon::createFromDate(2017, 11, 3));
      $this->add('Enter psychedelic skeleton VR', 'skele.png', 'http://bidoofgoo.nl/oud/',
         Carbon::createFromDate(2016, 12, 1));
      $this->add('One demented <s>hecking</s> boi', 'fuk.png', 'https://bidoofgoo.deviantart.com/art/Scary-Guy-714356686',
         Carbon::createFromDate(2017, 11, 10));
      $this->add('Enter cool computer space', 'space.png', 'https://hot-server.glitch.me/eventList/spindex.html',
         Carbon::createFromDate(2017, 12, 15));
      $this->add('Mijnomi.nl', 'omi.png', 'https://www.mijnomi.nl',
         Carbon::createFromDate(2017, 12, 1));
      $this->add('Wonder mail S generator', 'pkmn.png', 'http://wondermails.bidoofgoo.nl/',
         Carbon::createFromDate(2018, 2, 23));
      $this->add('Soup VR', 'soup.png', 'http://soep.bidoofgoo.nl',
         Carbon::createFromDate(2018, 2, 16));
      $this->add('Project swim safe', 'zwem.png', 'https://veiligzwemmen.bidoofgoo.nl/',
         Carbon::createFromDate(2018, 4, 14));
      $this->add('Ticcs: heb ik lyme?', 'ticcs.png', 'http://ticcs.bidoofgoo.nl/',
         Carbon::createFromDate(2018, 6, 29));
      $this->add('Rufomagazijn', 'rufo.png', 'https://www.rufomagazijn.nl/',
         Carbon::createFromDate(2018, 10, 5));
      $this->add('Illustratie Kunstweek Warmond', 'knst.png', 'https://www.facebook.com/warmondkunstweek/?eid=ARDv1F45lDLwPsiXw6B34VNwPVLbS18fdixoiRdAXyPOrIcID0lEQkwOE55tb4dxxesPD7Xk2uSHAdn3',
         Carbon::createFromDate(2018, 11, 2));
   }

   public function add($name, $image, $url, $date = null){
      if ($date == null) {
         DB::table('projects')->insert([
            'name' => $name,
            'image' => $image,
            'url' => $url,
            'clicks' => 0
         ]);
      }
      else {
         DB::table('projects')->insert([
            'name' => $name,
            'image' => $image,
            'url' => $url,
            'clicks' => 0,
            'release_date' => $date
         ]);
      }
   }
}
