<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\AttributeValue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttributeValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objs = [
            ['name_tm' => 'Ýaşy', 'name_en' => 'Age', 'name_ru' => 'Возраст', 'attribute_name' => true, 'values' => [
                ['name_tm' => '21+', 'name_en' => null, 'name_ru' => null],
                ['name_tm' => '18+', 'name_en' => null, 'name_ru' => null],
                ['name_tm' => '16+', 'name_en' => null, 'name_ru' => null],
                ['name_tm' => '14+', 'name_en' => null, 'name_ru' => null],
                ['name_tm' => '12+', 'name_en' => null, 'name_ru' => null],
                ['name_tm' => '6+', 'name_en' => null, 'name_ru' => null],
                ['name_tm' => '0+', 'name_en' => null, 'name_ru' => null],
            ]],
            ['name_tm' => 'Ýurdy', 'name_en' => 'Country', 'name_ru' => 'Страна', 'attribute_name' => true, 'values' => [
                ['name_tm' => 'ABŞ', 'name_en' => 'USA', 'name_ru' => 'США'],
                ['name_tm' => 'Beýik Britaniýa', 'name_en' => 'Great Britain', 'name_ru' => 'Великобритания'],
                ['name_tm' => 'Russiýa', 'name_en' => 'Russia', 'name_ru' => 'Россия'],
                ['name_tm' => 'Ýaponiýa', 'name_en' => 'Japan', 'name_ru' => 'Япония'],
                ['name_tm' => 'Fransiýa', 'name_en' => 'France', 'name_ru' => 'Франция'],
                ['name_tm' => 'Indiýa', 'name_en' => 'India', 'name_ru' => 'Индия'],
                ['name_tm' => 'Koreýa', 'name_en' => 'Korea', 'name_ru' => 'Корея'],
                ['name_tm' => 'Türkiýe', 'name_en' => 'Turkey', 'name_ru' => 'Турция'],
                ['name_tm' => 'Germaniýa', 'name_en' => 'Germany', 'name_ru' => 'Германия'],
                ['name_tm' => 'Kanada', 'name_en' => 'Canada', 'name_ru' => 'Канада'],
                ['name_tm' => 'Ispaniýa', 'name_en' => 'Spain', 'name_ru' => 'Испания'],
                ['name_tm' => 'Hytaý', 'name_en' => 'China', 'name_ru' => 'Китай'],
                ['name_tm' => 'Türkmenistan', 'name_en' => 'Turkmenistan', 'name_ru' => 'Туркменистан'],
            ]],
            ['name_tm' => 'Žanry', 'name_en' => 'Genre', 'name_ru' => 'Жанр', 'attribute_name' => true, 'values' => [
                ['name_tm' => 'Harby', 'name_en' => 'Military', 'name_ru' => 'Военные'],
                ['name_tm' => 'Detektiw', 'name_en' => 'detectives', 'name_ru' => 'Детективы'],
                ['name_tm' => 'Dokumental', 'name_en' => 'Documental', 'name_ru' => 'Документальные'],
                ['name_tm' => 'Drama', 'name_en' => 'drama', 'name_ru' => 'Драмы'],
                ['name_tm' => 'Taryhy', 'name_en' => 'historical', 'name_ru' => 'Исторические'],
                ['name_tm' => 'Komediýa', 'name_en' => 'comedy', 'name_ru' => 'Комедийные'],
                ['name_tm' => 'Triller', 'name_en' => 'thriller', 'name_ru' => 'Триллеры'],
                ['name_tm' => 'Başdan geçirmeler', 'name_en' => 'adventure', 'name_ru' => 'Приключения'],
                ['name_tm' => 'Fantastika', 'name_en' => 'fantasy', 'name_ru' => 'Фантастика'],
                ['name_tm' => 'Sport', 'name_en' => 'Sport', 'name_ru' => 'Спорт'],
                ['name_tm' => 'Gokunç', 'name_en' => 'Horror', 'name_ru' => 'Ужастик'],
                ['name_tm' => 'Melodrama', 'name_en' => 'Melodram', 'name_ru' => 'Мелодрама'],
                ['name_tm' => 'Ylym-bilim', 'name_en' => 'Science fiction', 'name_ru' => 'Научная '],
            ]],
            ['name_tm' => 'Dili', 'name_en' => 'Language', 'name_ru' => 'Язык', 'attribute_name' => true, 'values' => [
                ['name_tm' => 'Türkmençe', 'name_en' => 'Turkmen', 'name_ru' => 'Туркменский'],
                ['name_tm' => 'Rusça', 'name_en' => 'Russian', 'name_ru' => 'Русский'],
                ['name_tm' => 'Iňlisçe', 'name_en' => 'English', 'name_ru' => 'Английский'],
                ['name_tm' => 'Türkçe', 'name_en' => 'Turkish', 'name_ru' => 'Турецкий'],
                ['name_tm' => 'Hindiçe', 'name_en' => 'Indian', 'name_ru' => 'Индийский'],
                ['name_tm' => 'Arapça', 'name_en' => 'Arabian', 'name_ru' => 'Арабский '],
                ['name_tm' => 'Hytaýça', 'name_en' => 'Chinese', 'name_ru' => 'Китайский'],
                ['name_tm' => 'Nemesça', 'name_en' => 'Deutsch', 'name_ru' => 'Немецкий'],
                ['name_tm' => 'Koreýça', 'name_en' => 'Korean', 'name_ru' => 'Корейский'],
            ]],
        ];

        for ($i = 0; $i < count($objs); $i++) {
            $attribute = Attribute::create([
                'name_tm' => $objs[$i]['name_tm'],
                'name_en' => $objs[$i]['name_en'],
                'name_ru' => $objs[$i]['name_ru'],
                'attribute_name' => $objs[$i]['attribute_name'],
                'sort_order' => $i + 1,
            ]);

            for ($j = 0; $j < count($objs[$i]['values']); $j++) {
                AttributeValue::create([
                    'attribute_id' => $attribute->id,
                    'name_tm' => $objs[$i]['values'][$j]['name_tm'],
                    'name_en' => $objs[$i]['values'][$j]['name_en'],
                    'name_ru' => $objs[$i]['values'][$j]['name_ru'],
                    'sort_order' => $j + 1,
                ]);
            }
        }
    }
}
