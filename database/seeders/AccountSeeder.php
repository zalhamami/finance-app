<?php

namespace Database\Seeders;

use App\Models\Account;
use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Cash'
            ],
            [
                'name' => 'Bank Account'
            ],
            [
                'name' => 'Account Receivable'
            ],
            [
                'name' => 'Operational Expenses'
            ]
        ];

        Account::truncate();
        foreach ($data as $item) {
            Account::create($item);
        }
    }
}
