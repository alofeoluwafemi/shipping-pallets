<?php

namespace App\Logic;

use App\Integrations\ShippingPricing;

class GetShippingPriceLogic
{
    public $box;

    public $shippingPricing;

    public function __construct(BoxLogic $boxLogic, ShippingPricing $shippingPricing)
    {
        $this->box = $boxLogic;
        $this->shippingPricing = $shippingPricing;
    }

    public function handle($parts)
    {
        $palletsNeeded =  $this->box->getNumberOfBoxesNeededFor($parts);

        return $this->shippingPricing->getCost($palletsNeeded) + ['pallets' => $palletsNeeded];
    }
}
