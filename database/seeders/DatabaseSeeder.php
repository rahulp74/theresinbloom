<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin user
        User::updateOrCreate(
            ['email' => 'admin@theresinbloom.in'],
            [
                'name' => 'Studio Admin',
                'password' => Hash::make('password'),
                'is_admin' => true,
            ]
        );

        // Categories
        $categories = [
            ['keychains', 'Resin Keychains', 'Hand-poured initial charms with seasonal blooms.'],
            ['name-plates', 'Name Plates', 'Elevate your entryway or desk with botanical elegance.'],
            ['photo-frames', 'Photo Frames', 'Preserve your favourite moments in glass-like clarity.'],
            ['couple-gifts', 'Couple Gifts', 'Personal keepsakes to celebrate every love story.'],
            ['wedding-gifts', 'Wedding Gifts', 'Turn wedding bouquets into eternal heirlooms.'],
            ['floral-resin-art', 'Floral Resin Art', 'Wall-worthy botanical compositions in resin.'],
            ['resin-clocks', 'Resin Clocks', 'Time, softly measured through petals and gold.'],
            ['home-decor', 'Home Decor', 'Trays, coasters and objects for quiet rooms.'],
            ['personalized-gifts', 'Personalized Gifts', 'One-of-one commissions, made just for you.'],
        ];
        $catIds = [];
        foreach ($categories as [$slug, $name, $tagline]) {
            $c = Category::updateOrCreate(['slug' => $slug], ['name' => $name, 'tagline' => $tagline]);
            $catIds[$slug] = $c->id;
        }

        // Products
        $products = [
            [
                'slug' => 'petal-coaster-duo', 'name' => 'Petal Coaster Duo', 'price' => 1250,
                'category' => 'home-decor', 'image' => 'images/product-coaster.jpg', 'swatch' => 'petal',
                'best_seller' => true, 'featured' => false, 'customizable' => true,
                'description' => 'A pair of hand-poured coasters set with pressed pink petals and a gilded rim — a quiet ritual for morning tea.',
                'details' => ['Set of two, ø 10 cm', 'Food-safe epoxy resin, 72-hour cured', 'Real dried petals, 22k gold-leaf rim', 'Ships in cotton pouch and gift box'],
            ],
            [
                'slug' => 'gilded-memory-frame', 'name' => 'Gilded Memory Frame', 'price' => 2400,
                'category' => 'photo-frames', 'image' => 'images/product-frame.jpg', 'swatch' => 'petal',
                'best_seller' => true, 'featured' => false, 'customizable' => true,
                'description' => "A translucent photo frame woven with baby's breath and gold leaf — send us your photo and we hand-set it in resin.",
                'details' => ['13 × 18 cm frame, 4 × 6" photo', 'Freestanding on walnut base', 'Photo printed on archival matte paper', 'Customisable name in gold script'],
            ],
            [
                'slug' => 'verdant-wall-clock', 'name' => 'Verdant Wall Clock', 'price' => 4800,
                'category' => 'resin-clocks', 'image' => 'images/product-clock.jpg', 'swatch' => 'leaf',
                'best_seller' => true, 'featured' => false, 'customizable' => false,
                'description' => 'A sage-toned resin clock with dried eucalyptus suspended around brass indices — a soft, moving still life.',
                'details' => ['ø 30 cm wall clock', 'Silent quartz movement', 'Sage resin, brass hands and markers', 'Real dried eucalyptus and gypsophila'],
            ],
            [
                'slug' => 'couples-keepsake-block', 'name' => "Couple's Keepsake Block", 'price' => 3200,
                'category' => 'couple-gifts', 'image' => 'images/product-couple.jpg', 'swatch' => 'petal',
                'best_seller' => true, 'featured' => true, 'customizable' => true,
                'description' => "A weighty resin block set with dried roses and your names in hand-painted calligraphy. An anniversary gift they'll keep forever.",
                'details' => ['15 × 8 × 4 cm block', 'Two names + date, hand-lettered', 'Real preserved red roses, gold flakes', 'Made to order in 10–14 days'],
            ],
            [
                'slug' => 'lavender-initial-charm', 'name' => 'Lavender Initial Charm', 'price' => 650,
                'category' => 'keychains', 'image' => 'images/product-keychain.jpg', 'swatch' => 'lavender',
                'best_seller' => false, 'featured' => true, 'customizable' => true,
                'description' => 'A pocket-sized keepsake — your initial poured in clear resin, wound with dried Provençal lavender sprigs.',
                'details' => ['ø 4 cm charm on brass ring', 'Single letter, choose any A–Z', 'Real dried lavender', 'Bridesmaid & return-gift friendly'],
            ],
            [
                'slug' => 'sage-script-nameplate', 'name' => 'Sage Script Nameplate', 'price' => 1850,
                'category' => 'name-plates', 'image' => 'images/product-nameplate.jpg', 'swatch' => 'leaf',
                'best_seller' => false, 'featured' => true, 'customizable' => true,
                'description' => 'A desk nameplate in translucent resin — sage leaves preserved beside your name in gold cursive.',
                'details' => ['20 × 5 cm on solid oak base', 'Up to 18 characters', 'Real bay and sage leaves', 'Hand-painted 22k gold script'],
            ],
            [
                'slug' => 'blossom-serving-tray', 'name' => 'Blossom Serving Tray', 'price' => 3600,
                'category' => 'floral-resin-art', 'image' => 'images/product-tray.jpg', 'swatch' => 'mist',
                'best_seller' => false, 'featured' => false, 'customizable' => false,
                'description' => 'A round serving tray with cherry blossoms floating in mist-blue resin and slim brass handles.',
                'details' => ['ø 32 cm tray, food-safe finish', 'Blush cherry blossoms, mist-blue tint', 'Solid brass handles', 'Wipe clean; not dishwasher safe'],
            ],
            [
                'slug' => 'eternal-bouquet-dome', 'name' => 'Eternal Bouquet Dome', 'price' => 8500,
                'category' => 'wedding-gifts', 'image' => 'images/product-wedding.jpg', 'swatch' => 'petal',
                'best_seller' => false, 'featured' => true, 'customizable' => true,
                'description' => "Send us your wedding bouquet and we'll preserve it inside a glass-clear resin dome — a lifetime heirloom.",
                'details' => ['ø 18 cm dome on walnut base', 'Made from your actual bouquet', '6–8 week preservation process', 'Includes courier collection in India'],
            ],
        ];

        foreach ($products as $p) {
            $cat = $p['category'];
            unset($p['category']);
            $p['category_id'] = $catIds[$cat];
            Product::updateOrCreate(['slug' => $p['slug']], $p);
        }
    }
}
