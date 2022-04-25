<?php

namespace App\SiteProApi;

class SiteProPayload
{
 
    public function formatSiteProPayload($data)
    {  
        if($data["test"] == '1'){
            $testMode = "true";
        }else{
            $testMode = "false";
        }

       $formattedData = array(
          "returnUrl" => $data["surl"],
          "confirmUrl" => $data["surl"],
          "publicKey" => $data["key"],
          "currency" => $data["currency"],
          "total" => $data["totalAmount"],
          "subTotalPrice" => $data["subTotalPrice"],
          "tax" => $data["taxPrice"],
          "orderId" => $data["txnid"],
          "orderDescription" =>$data["productinfo"],
          "storeId" => null,
          "countryCode" => $data["countryCode"],
          "referenceTransactionId" => $data["txnid"],
          "orderNumber" => $data["invoiceNumber"],
          "test" => $testMode,
          "extra1" => $data["extra1"],
          "customer_name" => $data["customer_name"],
          "customer_email" => $data["customer_email"],
          "customer_address" => $data["address1"],
          "epaycoLanguage" => $data["epaycoLanguage"]
       );
 
       return $formattedData;
    }

}