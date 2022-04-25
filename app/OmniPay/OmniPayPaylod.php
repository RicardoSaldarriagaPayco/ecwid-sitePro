<?php

namespace App\OmniPay;

class OmniPayPaylod
{
 
    public function formatOmniPayPaylod($data)
    {  
        if($data["test"] == '1'){
            $testMode = "true";
        }else{
            $testMode = "false";
        }

       $formattedData = array(
          "returnUrl" => $data["returnurl"],
          "confirmUrl" => $data["notifyUrl"],
          "publicKey" => $data["public_key"],
          "currency" => $data["currency"],
          "total" => $data["amount"],
          "subTotalPrice" => $data["subTotal"],
          "tax" => $data["tax"],
          "orderId" => $data["transactionId"],
          "orderDescription" =>$data["description"],
          "storeId" => null,
          "countryCode" => $data["country"],
          "referenceTransactionId" => $data["transactionId"],
          "orderNumber" => $data["transactionId"],
          "test" => $testMode,
          "extra1" => $data["transactionId"],
          "customer_name" => $data["firstName"] ." ". $data["lastName"],
          "customer_email" => $data["email"],
          "customer_address" => $data["address"],
          "epaycoLanguage" => $data["lang"]
       );
 
       return $formattedData;
    }

}