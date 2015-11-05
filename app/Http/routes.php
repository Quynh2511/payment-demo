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

    $billItem1 = new \App\Payment\BillItem();
    $billItem1->setName('a');
    $billItem1->setPrice(1.1)->setQuantity(1)->totalAmount();

    $bill->setBillItem($billItem1);
    $bill->price();

    $repository->insert($bill);

    return view('welcome');
});