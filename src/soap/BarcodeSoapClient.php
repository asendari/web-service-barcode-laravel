<?php

namespace Asendari\WebServiceBarcode\Soap;

use SoapClient;

class BarcodeSoapClient
{
    public $client;

    public function __construct()
    {
        $this->setClient();
    }

    private function setClient (){
        $wsdl = __DIR__ . '/barcode_v2_4.wsdl';

        $args = [
            'location' => config('barcode.url'),
            'login' => config('barcode.technical_user'),
            'password' => config('barcode.technical_password'),
            'connection_timeout' => 90,
            'compression'        => ( SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP ),
        ];

        if ( config('barcode.debug', false) ) {
            $args[ 'trace' ] = true;
        }

        $this->client = new SoapClient( $wsdl, $args );

    }

    public function generateLabel(array $order)
    {
        return "Coucou";
    }
}