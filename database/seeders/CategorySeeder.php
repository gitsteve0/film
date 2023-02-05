<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $objs = [
            ['Filmler', 'Films', 'Фильмы'],
            ['Seriallar', 'Serials', 'Сериалы',],
            ['Multfilmler', 'Cartoons', 'Мультфильмы',],
            ['Anime', 'Anime', 'Аниме',],
            ['TV show', 'TV show', 'ТВ Шоу',],
            ['Aýdymlar', 'Musics', 'Музыка',],
        ];

        for ($i = 0; $i < 6; $i++) {
            Category::create([
                'name_tm' => $objs[$i][0],
                'name_en' => $objs[$i][1],
                'name_ru' => $objs[$i][2],
                'sort_order' => $i + 1,
            ]);
        }
    }
}
