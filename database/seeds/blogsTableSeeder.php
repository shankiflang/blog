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

        for($i=0;$i<20;$i++){

            $date = $this->datealeatoire();

            DB::table('blogs')->insert(array(
                'titre'=>$faker->text(50),
                'texte'=>$faker->text(),
                'created_at'=>$date,
                'updated_at'=>$date
            ));
        }
    }
}
