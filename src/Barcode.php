<?php

namespace Asendari\WebServiceBarcode;

use Asendari\WebServiceBarcode\Soap\BarcodeSoapClient;

class Barcode
{
    private $soapClient;

    public function __construct()
    {
        $this->soapClient = new BarcodeSoapClient();
    }

    public function generateLabel(array $order) {
        return $this->soapClient->generateLabel($order);
    }
}