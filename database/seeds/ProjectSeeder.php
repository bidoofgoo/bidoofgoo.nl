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
        $this->add('Kat & Cavia RPG', 'img/katcavia.png', '/katcavia');
        $this->add('Skeleton cave', 'img/skelcav.png', 'https://bidoofgoo.deviantart.com/art/The-Cave-626435086');
        $this->add('Why we hate you', 'img/hate.png', '/hate');
        $this->add('Eddsworld: Just a bit crazy REMASTERED', 'img/edd.png', 'https://www.youtube.com/watch?v=WnX8mijcaZc');
        $this->add('Ont-wikkeling.net', 'img/ontwikkeling.png', 'www.ont-wikkeling.net');
        $this->add('Enter psychedelic skeleton VR', 'img/skele.png', 'http://bidoofgoo.nl/oud/');
        $this->add('One demented <strike>hecking</strike> boi', 'img/fuk.png', 'https://bidoofgoo.deviantart.com/art/Scary-Guy-714356686');
        $this->add('Enter cool computer space', 'img/space.png', 'https://hot-server.glitch.me/eventList/spindex.html');
        $this->add('Mijnomi.nl', 'img/omi.png', 'https://www.mijnomi.nl');
        $this->add('Wonder mail S generator', 'img/pkmn.png', 'http://wondermails.bidoofgoo.nl/');
        $this->add('Soup VR', 'img/soup.png', 'http://soep.bidoofgoo.nl');
        $this->add('Project swim safe', 'img/zwem.png', 'https://veiligzwemmen.bidoofgoo.nl/');
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
