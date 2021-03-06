<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class blogsTableSeeder extends Seeder
{

    private function datealeatoire(){
        return Carbon::createFromDate('2018', rand(1,12), rand(1,28));
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blogs')->delete();

        $faker = Faker\Factory::create();

        for($i=0;$i<30;$i++){

            $date = $this->datealeatoire();

            DB::table('blogs')->insert(array(
                'titre' => $faker->text(50),
                'texte' => $faker->text(),
                'auteur' => $faker->text(5),
                'image' => $faker->imageUrl($width = 700, $height = 300),
                'created_at' => $date,
                'categorie_id' => $faker->numberBetween(1,10),
                'updated_at' => $date
            ));
        }
    }
}
