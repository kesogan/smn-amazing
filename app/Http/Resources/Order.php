<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Order extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
     {
        return [
            'id'=>$this->id,
            'order_id'=>$this->order_id,
            'used_api'=>$this->used_api,
            'status'=>$this->status,
            'addres1_bill'=>$this->addres1_bill,
            'addres2_bill'=>$this->addres2_bill,
            'full_name_bill'=>$this->full_name_bill,
            'mail_on_bill'=>$this->mail_on_bill,
            'tel_on_bill'=>$this->tel_on_bill,
            'shipping'=>$this->shipping,
            //'amount'=>$this->result->purchase_units[0]->amount->value
            ];
        //return parent::toArray($request);
    }
}
