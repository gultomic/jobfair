<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Event;
use App\Models\Jobfair;
use App\Models\Kehadiran;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class mainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Jobfair::truncate();
        Event::truncate();
        Kehadiran::truncate();
        Schema::enableForeignKeyConstraints();

        $faker = Faker::create('id_ID');
        $users = User::where('role', 'user')->get();

        for ($j=1; $j <= 5 ; $j++) {
            $jf = Jobfair::create([
                'nama' => $faker->words(rand(2, 5), true),
                // 'deskripsi' => $faker->paragraphs(2, true),
                'refs' => [
                    'image' => 'https://picsum.photos/800/600?random='.rand(999,10000)
                ]
            ]);

            for ($e=1; $e <= rand(1, 3); $e++) {
                $ev = Event::create([
                    'jobfair_id' => $jf->id,
                    'tanggal' => $faker->dateTimeBetween('-2 months', '-1 days'),
                    'refs' => [
                        'lokasi' => $faker->address(),
                        'keterangan' => $faker->paragraphs(2, true)
                    ]
                ]);

                $tgl = Carbon::parse($ev->tanggal)->format('Y-m-d');
                $set = $tgl . " " . $faker->time;

                // echo Carbon::parse($set)->format('') . "\n";

                foreach ($users as $key => $value) {
                    Kehadiran::create([
                        'event_id' => $ev->id,
                        'user_id' => $value->id,
                        'created_at' => $set,
                        'updated_at' => $set,
                    ]);
                }
            }
        }

        $jf = Jobfair::create([
            'nama' => $faker->words(rand(2, 5), true),
            // 'deskripsi' => $faker->paragraphs(2, true),
            'refs' => [
                'image' => 'https://picsum.photos/800/600?random='.rand(999,10000)
            ]
        ]);

        Event::create([
            'jobfair_id' => $jf->id,
            'tanggal' => Carbon::now(),
            'refs' => [
                'lokasi' => $faker->address(),
                'keterangan' => $faker->paragraphs(2, true)
            ]
        ]);
        Event::create([
            'jobfair_id' => $jf->id,
            'tanggal' => Carbon::now(),
            'refs' => [
                'lokasi' => $faker->address(),
                'keterangan' => $faker->paragraphs(2, true)
            ]
        ]);

        $jf = Jobfair::create([
            'nama' => $faker->words(rand(2, 5), true),
            // 'deskripsi' => $faker->paragraphs(2, true),
            'refs' => [
                'image' => 'https://picsum.photos/350/600?random='.rand(999,10000)
            ]
        ]);

        Event::create([
            'jobfair_id' => $jf->id,
            'tanggal' => Carbon::now()->add(1, 'day'),
            'refs' => [
                'lokasi' => $faker->address(),
                'keterangan' => $faker->paragraphs(2, true)
            ]
        ]);
        Event::create([
            'jobfair_id' => $jf->id,
            'tanggal' => Carbon::now()->add(2, 'day'),
            'refs' => [
                'lokasi' => $faker->address(),
                'keterangan' => $faker->paragraphs(2, true)
            ]
        ]);
    }
}
