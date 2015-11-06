<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/sku/{id}', function (\App\Shopping\SKURepository $repository, $id) {
    return $repository->find($id);
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/billinsert', function (\App\Payment\BillRepository $repository) {

    $bill = new \App\Payment\Bill();
    $sku = new \App\Shopping\SKU();
    $member =  new \App\Member\Member();
    $sku->setId(22);
    $sku->setName("hung");
    $sku->setOriginPrice(199);
    $quantity = 5;
    $billItem1 = new \App\Payment\BillItem($sku, $quantity);
    $member->setId(12);
    $bill->setBillItem($billItem1);
    $bill->price();
    $bill->setMember($member);
    $repository->save($bill);

    return view('welcome');
});