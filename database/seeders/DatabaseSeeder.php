<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Faker::create();
        
        $users = [];
        for ($i = 0; $i < 5; $i++) {
            $users[] = [
                'nim' => $faker->unique()->numerify('##########'),
                'username' => $faker->unique()->userName(),
                'password' => Hash::make('password'),
                'role' => $faker->randomElement(['buyer', 'seller']),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('users')->insert($users);

        $products = [];
        for ($i = 0; $i < 10; $i++) {
            $products[] = [
                'name' => ucfirst($faker->words(3, true)),
                'price' => $faker->numberBetween(50000, 5000000),
                'condition' => $faker->randomElement(['baru', 'bekas']),
                'description' => $faker->sentences(3, true),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // DB::table('products')->insert($products);

        // $paymentStatus = ['menunggu konfirmasi', 'Berhasil', 'Ditolak'];
        // $payments = [];
        // for ($i = 0; $i < 12; $i++) {
        //     $price = $faker->numberBetween(75000, 7500000);
        //     $payments[] = [
        //         'product_name' => ucfirst($faker->words(2, true)),
        //         'product_price' => $price,
        //         'payment_proof' => $faker->imageUrl(640, 480, 'payment', true),
        //         'status' => $faker->randomElement($paymentStatus),
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ];
        // }

        // DB::table('payments')->insert($payments);

        $orderStatus = ['dikemas', 'dalam perjalanan', 'sampai'];
        $orders = [];
        for ($i = 0; $i < 20; $i++) {
            $orders[] = [
                'product_name' => ucfirst($faker->words(3, true)),
                'product_price' => $faker->numberBetween(75000, 5000000),
                'status' => $faker->randomElement($orderStatus),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('orders')->insert($orders);
    }
}
//for($i = 1; $i <= 50; $i++)