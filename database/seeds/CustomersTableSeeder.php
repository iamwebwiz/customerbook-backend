<?php

use App\Customer;
use Illuminate\Database\Seeder;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $records = $this->command->ask('How many records do you want to create? ', 3);

        factory(Customer::class, (int) $records)->create();

        $this->command->info("{$records} customer records created successfully.");
    }
}
