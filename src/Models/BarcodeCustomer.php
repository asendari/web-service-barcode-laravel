<?php

namespace Asendari\WebServiceBarcode\Models;

use Asendari\WebServiceBarcode\Helpers\BarcodeHelpers;

class BarcodeCustomer extends BarcodeModel
{
    public string $name1;
    public string $name2;
    public string $street;
    public string $zip;
    public string $city;
    public string $country;
    public string $logo;
    public string $logoFormat;
    public int $logoRotation;
    public string $logoAspectRatio;
    public string $logoHorizontalAlign;
    public string $logoVerticalAlign;
    public string $domicilePostOffice;
    public string $pobox;

    public function toSoap(): array
    {

        $datas = parent::toSoap();

        $datas["POBox"] = $datas["Pobox"];
        $datas["ZIP"] = $datas["Zip"];

        return $datas;
    }


}