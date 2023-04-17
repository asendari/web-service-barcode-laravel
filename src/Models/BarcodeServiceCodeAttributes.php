<?php

namespace Asendari\WebServiceBarcode\Models;

class BarcodeServiceCodeAttributes extends BarcodeModel
{
    public array $przl;
    public string $freeText;
    public string $deliveryDate;
    public int $parcelNo;
    public int $parcelTotal;
    public string $deliveryPlace;
    public bool $proClima;
    public int $weight;
    public array $unnumbers;
    public array$dimensions;

    public function toSoap(): array
    {

        $datas = parent::toSoap();

        $datas["PRZL"] = isset($datas["Przl"]) ? $datas['Przl'] : '';

        return $datas;
    }
}