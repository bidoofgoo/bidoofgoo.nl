<?php

use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->add('Kat & Cavia RPG', 'katcavia.png', '/katcavia');
        $this->add('Skeleton cave', 'skelcav.png', 'https://bidoofgoo.deviantart.com/art/The-Cave-626435086');
        $this->add('Why we hate you', 'hate.png', '/hate');
        $this->add('Eddsworld: Just a bit crazy REMASTERED', 'edd.png', 'https://www.youtube.com/watch?v=WnX8mijcaZc');
        $this->add('Ont-wikkeling.net', 'ontwikkeling.png', 'www.ont-wikkeling.net');
        $this->add('Enter psychedelic skeleton VR', 'skele.png', 'http://bidoofgoo.nl/oud/');
        $this->add('One demented <s>hecking</s> boi', 'fuk.png', 'https://bidoofgoo.deviantart.com/art/Scary-Guy-714356686');
        $this->add('Enter cool computer space', 'space.png', 'https://hot-server.glitch.me/eventList/spindex.html');
        $this->add('Mijnomi.nl', 'omi.png', 'https://www.mijnomi.nl');
        $this->add('Wonder mail S generator', 'pkmn.png', 'http://wondermails.bidoofgoo.nl/');
        $this->add('Soup VR', 'soup.png', 'http://soep.bidoofgoo.nl');
        $this->add('Project swim safe', 'zwem.png', 'https://veiligzwemmen.bidoofgoo.nl/');
    }

    public function add($name, $image, $url){
      DB::table('projects')->insert([
         'name' => $name,
         'image' => $image,
         'url' => $url,
         'clicks' => 0
      ]);
   }
}
