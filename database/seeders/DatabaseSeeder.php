<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Actor;
use App\Models\Customer;
use App\Models\Director;
use App\Models\Season;
use App\Models\SeasonEpisode;
use App\Models\Verification;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            AttributeValueSeeder::class,
        ]);

        Season::factory()->count(300)->create();
        SeasonEpisode::factory()->count(700)->create();
        Actor::factory()->count(150)->create();
        Director::factory()->count(10)->create();

        for ($i = 0; $i < 50; $i++) {
            $verification = Verification::factory()->create();
            if ($verification->status) {
                Customer::factory()
                    ->create([
                        'username' => $verification->phone,
                        'password' => bcrypt($verification->code),
                        'created_at' => $verification->created_at,
                    ]);
            }
        }
    }
}
