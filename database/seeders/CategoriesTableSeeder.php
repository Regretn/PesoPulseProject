<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            'Groceries',
            'Utilities',
            'Rent/Mortgage',
            'Transportation',
            'Insurance',
            'Healthcare',
            'Entertainment',
            'Dining Out',
            'Shopping',
            'Savings',
            'Investments',
            'Loan Repayment',
            'Education',
            'Travel',
            'Gifts/Donations',
        ];

        $userId = 1; // Replace this with the actual user ID you want to associate with the categories.

        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'category_name' => $category,
                'user_id' => $userId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
