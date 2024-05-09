<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Database\Seeder;
use Database\Factories\TransactionFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Order::factory(2500)->create()->each(function ($order) {
            $order->update([
                'display_id' => '#'.str_pad($order->id + 1, 8, "0", STR_PAD_LEFT)
            ]);
            $status = 'pending';
            switch ($order->status) {
                case 'pending':
                    $status = 'pending';
                    break;

                case 'completed':
                    $status = 'paid';
                    break;

                case 'processing':
                    $status = 'failed';
                    break;
            }
            Transaction::create([
                'uuid' => fake()->uuid,
                'order_id' => $order->id,
                'status' => $status,
                'payment_type' => fake()->randomElement(['paypal', 'razorpay', 'cod', 'stripe']),
            ]);
        });
    }
}
