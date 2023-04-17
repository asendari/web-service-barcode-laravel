<?php

namespace Asendari\WebServiceBarcode\Models;

class BarcodeItem extends BarcodeModel
{
    public string $itemId;
    public string $itemNumber;
    public BarcodeRecipient $recipient;
    public BarcodeAdditionalData $additionalData;
    public BarcodeServiceCodeAttributes $attributes;
    public array $notification;
}