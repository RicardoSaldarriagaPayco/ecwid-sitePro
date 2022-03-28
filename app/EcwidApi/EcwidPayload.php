<?php

namespace App\EcwidApi;

class EcwidPayload
{
    const APPROVED_TRX_STATE = "PAID";
    const DENIED_TRX_STATE = "INCOMPLETE";
    const PENDING_TRX_STATE = "AWAITING_PAYMENT";
    const CLIENT_SECRET = getenv("ECWID_SECRET");
    const CLIENT_ID = getenv("ECWID_CLIENT_ID");
    const IV = "abcdefghijklmnop";
    const CIPHER = "aes-128-cbc";
 
    public function formatEcwidPayload($data)
    {  
       
       $cartData = $data["cart"];
       $cartOrder = $cartData["order"];
       $ciphertext_raw = openssl_encrypt($data['token'], self::CIPHER, self::CLIENT_SECRET, OPENSSL_RAW_DATA, self::IV);
       $hmac = hash_hmac('sha256', $ciphertext_raw, self::CLIENT_SECRET, $as_binary=true);
       $callbackPayload = base64_encode( self::IV.$hmac.$ciphertext_raw );
       $orderInfor =  $data['storeId'].
            "/".$cartOrder["orderNumber"].
            "/".$callbackPayload;
        //$url = getenv("ECWID_URL");
        $url = 'https://plugins.epayco.io/develop/pyreact/public/ecwid/';
        $responseUrl= $url.'response/'.$orderInfor;
        $callbackUrl= $url.'confirm/'.$orderInfor;  
        $formattedData = array(
          "returnUrl" => $responseUrl,
          "confirmUrl" => $callbackUrl,
          "publicKey" => $data["merchantAppSettings"]["public_key"],
          "currency" => $cartData["currency"],
          "total" => $cartOrder["total"],
          "subTotalPrice" => $cartOrder["subtotal"],
          "tax" => $cartOrder["tax"],
          "orderId" => $cartOrder["id"],
          "orderDescription" => $this->getOrderDescription($cartOrder["items"]),
          "storeId" => $data["storeId"],
          "countryCode" => $cartOrder["billingPerson"]["countryCode"],
          "referenceTransactionId" => $cartOrder["referenceTransactionId"],
          "orderNumber" => $cartOrder["orderNumber"],
          "test" => $data["merchantAppSettings"]['testMode'],
          "extra1" => $cartOrder["orderNumber"],
          "customer_name" => $cartOrder["billingPerson"]["name"],
          "customer_email" => $cartOrder["email"],
          "customer_address" => $cartOrder["billingPerson"]["street"]
       );
 
       return $formattedData;
    }

    private function getOrderDescription($itemsArr)
    {
       $orderDescription = "Product(s): ";
 
       for ($i = 0; $i < count($itemsArr); $i++) {
          if($i > 0) {
             $orderDescription .= ", ";
          }
 
          $orderDescription .= $itemsArr[$i]["name"];
       }
 
       return $orderDescription;
    }

    public function decryptEcwidPayload($data) {
        // Get the encryption key (16 first bytes of the app's client_secret key)
        $encryption_key = substr(self::CLIENT_SECRET, 0, 16);
        // Decrypt payload
        $json_data = $this->aes_128_decrypt($encryption_key, $data['data']);

        // Decode json
        $json_decoded = json_decode($json_data, true);
        return $json_decoded;
    }

    private function aes_128_decrypt($key, $data) {
        
        // Ecwid sends data in url-safe base64. Convert the raw data to the original base64 first
        $base64_original = str_replace(array('-', '_'), array('+', '/'), $data);

        // Get binary data
        $decoded = base64_decode($base64_original);

        // Initialization vector is the first 16 bytes of the received data
        $iv = substr($decoded, 0, 16);

        // The payload itself is is the rest of the received data
        $payload = substr($decoded, 16);

        // Decrypt raw binary payload
        $json = openssl_decrypt($payload, "aes-128-cbc", $key, OPENSSL_RAW_DATA, $iv);

        return $json;
    }

    public function getPaymentStatus($status = null)
   {
      if($status == "Aceptada"){
         return self::APPROVED_TRX_STATE;
      }
      else if($status == "Rechazada" || $status == "Fallida"){
         return self::DENIED_TRX_STATE;
      }
      else {
         return self::PENDING_TRX_STATE;
      }
   }

   public function getToken($callbackPayload){
        //decrypt ....
        $ivlen = openssl_cipher_iv_length("AES-128-CBC");
        $c = base64_decode($callbackPayload);
        $hmac = substr($c, $ivlen, $sha2len=32);
        $ciphertext_raw = substr($c, $ivlen+$sha2len);
        $token = openssl_decrypt($ciphertext_raw,  self::CIPHER, self::CLIENT_SECRET, OPENSSL_RAW_DATA, self::IV);
        $calcmac = hash_hmac('sha256', $ciphertext_raw, self::CLIENT_SECRET, $as_binary=true);
        if (hash_equals($hmac, $calcmac))
        {
            return $token;
        }else{
            return $token; 
        }
   }
   
    public function updatePaymentEcwid($storeId,$orderNumber,$token, $status, $redirect=false)
    {
        if(!$redirect && $status == 'INCOMPLETE'){
            $status="CANCELLED";
        }
        // URL used to update the order via Ecwid REST API
        $url = "https://app.ecwid.com/api/v3/$storeId/orders/transaction_$orderNumber?token=$token";
        // Prepare request body for updating the order
        $json = json_encode(array(
            "paymentStatus" => $status,
            "externalTransactionId" => "transaction_".$orderNumber
        ));
        // Send request to update order
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Content-Length: ' . strlen($json)));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($ch, CURLOPT_POSTFIELDS,$json);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        if($redirect){
            $returnUrl = "https://app.ecwid.com/custompaymentapps/".$storeId."?orderId=".$orderNumber."&clientId=".self::CLIENT_ID;
             echo "<script>window.location = '$returnUrl'</script>";
        }else{
            echo "paymentStatus ".$status;
        }

    }

}