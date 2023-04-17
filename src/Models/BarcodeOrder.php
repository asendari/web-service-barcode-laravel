<?php

namespace Asendari\WebServiceBarcode\Models;

class BarcodeOrder extends BarcodeGenerateLabel
{
    const TYPE_ORDER    = 'order';
    const TYPE_DRAFT    = 'draft';
    const TYPE_TEMPLATE = 'template';
    const TYPE_BULK     = 'bulk';

    public int $id;
    public string $order_type;
    public int $customer_id;
    public int $label_id;
    public int $recipient_id;
    public BarcodeRecipient $address;
    public string $przl;
    public string $label_size;
    public string $dispatch_type;
    public string $additions;
    public string $free_text;
    public int $delivery_date;
    public int $parcel_no;
    public int $parcel_total;
    public string $delivery_place;
    public bool $proclima;
    public int $weight;
    public string $print_addresses;
    public string $unnumber;
    public int $image_id;
    public string $image_url;
    public string $time;
    public int $wc_order_id;
    public string $ident_code;
    public BarcodeLabelDefinition $labelDefinition;
    public string $notification_type;
    public array $notification;
    public string $notices;
    public string $errors;
    public bool $is_automatic_order;
    public bool $num_connected_orders;
    public string $connected_orders;
    public string $filename;
    public int $label_position;
    public string $api;
}