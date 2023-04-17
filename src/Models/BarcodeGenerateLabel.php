<?php

namespace Asendari\WebServiceBarcode\Models;

class BarcodeGenerateLabel extends BarcodeModel
{
    public string $language;
    public string $frankingLicense;
    public bool $ppFranking;
    public BarcodeCustomer $customer;
    public string $customerSystem;
    public BarcodeLabelDefinition $labelDefinition;
    public string $sendingId;
    public BarcodeItem $item;

}