<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CareerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $images = ['canton.png', 'kakaw.png', 'bakerman.png'];
        
        for ($i = 1; $i <= 10; $i++) {
            $title = "Career Title $i";
            $content = "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec a diam lectus. Sed sit amet ipsum mauris. Maecenas congue ligula ac quam viverra nec consectetur ante hendrerit. Donec et mollis dolor.</p>";
            $content .= "<p>Pellentesque non suscipit velit. Nulla facilisi. Maecenas ac quam ut ligula hendrerit pretium. Fusce venenatis felis et arcu suscipit, non dapibus lectus convallis. Fusce lacinia magna non nibh tincidunt facilisis.</p>";
            $content .= "<p>Integer fringilla mauris et nulla elementum, nec condimentum quam aliquet. Curabitur in elit ut eros vestibulum mattis. Proin nec ligula eu libero sollicitudin ultricies. Etiam in orci ut velit consectetur scelerisque.</p>";
            $content .= "<p>Phasellus varius nisl ut magna cursus, ut gravida arcu fringilla. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Etiam at lacus ac elit pharetra elementum et nec justo.</p>";

            DB::table('careers')->insert([
                'title' => $title,
                'slug' => Str::slug($title),
                'image' => $images[array_rand($images)],
                'content' => $content,
                'meta_key' => "meta key $i",
                'meta_desc' => "meta description $i",
            ]);
        }
    }
}
