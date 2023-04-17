<?php

namespace Asendari\WebServiceBarcode\Soap;

use Asendari\WebServiceBarcode\Models\BarcodeOrder;
use Illuminate\Support\Facades\Log;
use SoapClient;
use SoapFault;

class BarcodeSoapClient
{
    public $client;
    protected $debug = false;

    public function __construct()
    {
        $this->setClient();

        $this->debug = config('barcode.debug', false);
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

    public function generateLabel(BarcodeOrder $order)
    {
        $soapDefinition = [
            'Language' => $order->language,
            'Envelope' => [
                'LabelDefinition' => $order->labelDefinition->toSoap(),
                'FileInfos'       => [
                    'FrankingLicense' => config('barcode.franking_license'),
                    'PpFranking'      => false,
                    'Customer'        => $order->customer->toSoap(),
                    'CustomerSystem'  => 'Asendari WebServiceBarCodeLaravel',
                ],
                'Data'            => [
                    'Provider' => [
                        'Sending' => [
                            'SendingID' => $order->id,
                            'Item'      => [
                                $order->item->toSoap()
                            ]
                        ]
                    ],
                ],
            ]
        ];

        return $this->sendSoapRequest( $soapDefinition, array( $this->client, 'GenerateLabel' ) );
    }

    private function sendSoapRequest( $args, $func )
    {
        try {
            $response = $func( $args );
        } catch ( SoapFault $e ) {
            $this->debug( $e );
            $response = [
                'error' => true,
                'message' => $this->formatError( $e ),
            ];
        }

        return $response;
    }

    /**
     * Prints and logs response.
     *
     * @param $response
     * @param bool $die
     */
    public function debug( $response, $die = true )
    {

        if ( $this->debug ) {

            // Show
            Log::error( print_r($response) );

            if ( $die ) {
                die();
            }
        }
    }

    public function formatError( $fault )
    {
        $msg = sprintf( "ERROR: The Barcode Server returned Error-Code '%s' with the following message: %s", $fault->faultcode, $fault->faultstring );
        return $msg;
    }




}