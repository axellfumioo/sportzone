<?php
namespace Database\Seeders;

use App\Models\arena;
use App\Models\SportsList;
use Illuminate\Database\Seeder;

class SportsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $sports = [
            [
                'id'                 => 1,
                'sports_name'        => 'Billiard',
                'sports_description' => 'A cue sport played on a table with balls and a cue stick, requiring precision and strategy.',
            ],
            [
                'id'                 => 2,
                'sports_name'        => 'Gokart',
                'sports_description' => 'A motorsport involving small, open-wheel vehicles raced on scaled-down tracks for speed and fun.',
            ],
            [
                'id'                 => 3,
                'sports_name'        => 'Bowling',
                'sports_description' => 'A sport where players roll a heavy ball down a lane to knock over ten pins arranged in a triangular formation.',
            ],

        ];
        // Generate slug for arena_name
        $arena_name = 'Go-kart PIK 2';
        $arena_slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $arena_name)));

        $arena = [
            [
                'sports_list_id'      => 2, // Make sure this matches an existing sports_lists id
                'arena_slugs'         => $arena_slug,
                'arena_name'          => $arena_name,
                'arena_track'          => 'Indoor',
                'arena_description'   => 'Sensasi balap gokart dengan trek seru dan menantang 🔥',
                'arena_rating'        => '4.8',
                'arena_reviews'       => '2345',
                'arena_opening_hours' => '09:00',
                'arena_closing_hours' => '21:00',
                'arena_address'       => 'Pantai Indah Kapuk 2, Jakarta',
                'arena_price'         => '120000',
                'arena_price_range'   => 'Rp.120.000 - Rp.200.000',
                'selection_type'      => 'difficulty',
                'selections'          => json_encode(['easy', 'medium', 'hard']),
                'arena_background'      => 'https://images.unsplash.com/photo-1560990817-aaa93354ea9c?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
            ],

        ];
        SportsList::insert($sports);
        arena::insert($arena);
    }
}
