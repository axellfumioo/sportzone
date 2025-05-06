<?php
namespace Database\Seeders;

use App\Models\Promo;
use App\Models\SportsList;
use Illuminate\Database\Seeder;

class PromoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $promo = [
            [
                'name'        => '🎳 Diskon Bowling 20%',
                'description' => 'Main bowling makin seru dengan potongan harga khusus hari kerja!',
                'validuntil' => '2025-05-15',
                'code' => 'BOWLING20',
                'discount' => '20',
                'limit' => 5,
            ],
            [
                'name'        => '🎱 Billiard Promo 10%',
                'description' => 'Dapatkan promo billiard potongan 10%',
                'validuntil' => '2025-05-20',
                'code' => 'BILLIARD10',
                'discount' => '10',
                'limit' => 5,
            ],
            [
                'name'        => '🏎️ Cashback Gokart 25%',
                'description' => 'Balapan di akhir pekan? Dapetin cashback langsung ke dompet kamu!',
                'validuntil' => '2025-05-31',
                'code' => 'GOKART25',
                'discount' => '25',
                'limit' => 5,
            ],

        ];

        Promo::insert($promo);
    }
}
