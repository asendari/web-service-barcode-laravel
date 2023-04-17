<?php

namespace Asendari\WebServiceBarcode\Models;

class BarcodeRecipient extends BarcodeModel
{
    
    public int $id;
    public string $postIdent;
    public string $title;
    public bool $personallyAddressed;
    public string $name1;
    public string $firstName;
    public string $name2;
    public string $name3;
    public string $addressSuffix;
    public string $street;
    public string $houseNo;
    public string $floorNo;
    public string $mailboxNo;
    public string $zip;
    public string $city;
    public string $country;
    public string $phone;
    public string $mobile;
    public BarcodeLabelAddress $labelAddress;
    public string $pobox;
    public string $email;
    public string $wc_order_id;
    public string $itemId;

    public function toSoap(): array
    {

        $datas = parent::toSoap();

        $datas["POBox"] = isset($datas["Pobox"]) ? $datas['Pobox'] : '';
        $datas["ZIP"] = $datas["Zip"];

        return $datas;
    }
}