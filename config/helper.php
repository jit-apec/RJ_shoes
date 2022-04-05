<?php

use App\Modules\Checkout\Models\address;


function getBillingAddress($id = '')
{
    $billing_address =address::where('id',$id)->get();
    return $billing_address;
}
function getShippingAddress($id = '')
{
    $shipping_address =address::where('id',$id)->get();
    return $shipping_address;
}

