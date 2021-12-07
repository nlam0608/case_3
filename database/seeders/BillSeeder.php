<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bill;

class BillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bill = new Bill();
        $bill->vat = '10%';
        $bill->totalQuantity = '';
        $bill->totalPrice = '10000';
        $bill->status = 'chưa thanh toán';
        $bill->save();
    }
}
