<?php

namespace Asendari\WebServiceBarcode\Models;

class BarcodeLabelDefinition extends BarcodeModel
{

    const PRINT_ADRESSES_NONE               = 'None';
    const PRINT_ADRESSES_RECIPIENT          = 'OnlyRecipient';
    const PRINT_ADRESSES_CUSTOMER           = 'OnlyCustomer';
    const PRINT_ADRESSES_RECIPIENT_CUSTOMER = 'RecipientAndCustomer';

    public string $labelLayout;
    public string $printAddresses;
    public string $imageFileType;
    public int $imageResolution;
    public bool $printPreview = false;
    public bool $colorPrintRequired;
    public string $itemId;
    public string $identCode;
    public string $filename;
    public int $recipient_id;
    public int $wc_order_id;
    public int $time;
    public string $print_medium;
}