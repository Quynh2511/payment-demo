<?php
/**
 * Created by PhpStorm.
 * User: cuuthegioi
 * Date: 11/9/15
 * Time: 4:09 PM
 */

namespace App\Payment\Presenters;

use App\Contracts\Paying\Bill;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;

/**
 * Class BillListJsonPresenter
 * @package App\Payment\Presenters
 */
class BillListJsonPresenter implements Arrayable,Jsonable
{

    /**
     * @var Bill[]
     */
    protected $bills;

    /**
     * BillListJsonPresenter constructor.
     * @param $bills
     */
    public function __construct($bills)
    {
        $this->bills = $bills;
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        $rawListBill = [];

        foreach($this->bills as $bill){

            array_push($rawListBill,[
                'id'            => $bill->id(),
                'total-amount'  => $bill->totalAmount(),
                'purchase-date' => $bill->purchaseDate()
            ]);
        }
        return $rawListBill;
    }

    /**
     * Convert the object to its JSON representation.
     *
     * @param  int $options
     * @return string
     */
    public function toJson($options = 0)
    {
       return json_encode($this->toArray(), $options);
    }
}