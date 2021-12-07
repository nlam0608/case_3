<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bill;
use Illuminate\Support\Facades\Session;

class BillController extends Controller
{
    public function createBill(Request $request)
    {
        $cart =Session::get('cart');
        $bill = new Bill();
        $bill->vat = $cart["totalMoney"]*0.1;
        $bill->totalQuantity = $cart["totalQuantity"];
        $bill->totalPriceBill = $cart["totalMoney"]-$cart["totalMoney"]*0.1;
        $bill->status = '1';
        $bill->save();
        return redirect()->route('bill.index',compact('bill'));
    }

    public function index()
    {
        $bills =  Bill::all();
        return view('admin.bill.list', compact('bills'));
    }
}
