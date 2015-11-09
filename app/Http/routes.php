<?php

use App\Shopping\DurationPromotionFinder\DurationPromotionFinderService;
use App\Shopping\SKURepository;

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

Route::get('/', function (DurationPromotionFinderService $sv, SKURepository $repository) {
    $sku = $repository->find(1);
    dd($sv->getPromotionFor($sku));
});

Route::get('/sku/{id}', ['uses' => 'ProductController@show']);
Route::get('/sku', ['uses' => 'ProductController@index']);

Route::get('/bill/{id}', function(\App\Payment\BillRepository $billRepo, $id){
    $billList = $billRepo->getBillsByMember($id);
    $billListPresenter = new \App\Payment\Presenters\BillListJsonPresenter($billList);

    return $billListPresenter;
});
