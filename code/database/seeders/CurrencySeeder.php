<?php

    namespace Database\Seeders;

    use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use Illuminate\Database\Seeder;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Str;


    class CurrencySeeder 
        extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            //
            DB::table('currencies')->insert(
                [
                    'currency_name' => 'danish krone',
                    'currency_acronyms' => 'dkk'
                ]
            );

            DB::table('currencies')->insert(
                [
                    'currency_name' => 'united states dollar',
                    'currency_acronyms' => 'usd',
                    'currency_symbols' => '$'
                ]
            );

            DB::table('currencies')->insert(
                [
                    'currency_name' => 'canadian dollar',
                    'currency_acronyms' => 'ca$',
                    'currency_symbols' => '$'
                ]
            );
            
        }

    }

?>