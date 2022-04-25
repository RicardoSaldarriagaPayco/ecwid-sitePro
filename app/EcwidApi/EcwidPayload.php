<?php

namespace App\EcwidApi;

define("CLIENT_SECRET", config("services.ecwid.client_secret"));
define("CLIENT_ID", config("services.ecwid.client_id"));

class EcwidPayload
{
    const APPROVED_TRX_STATE = "PAID";
    const DENIED_TRX_STATE = "INCOMPLETE";
    const PENDING_TRX_STATE = "AWAITING_PAYMENT";
 
    public function formatEcwidPayload($data)
    {  
       $language = json_decode($data["merchantAppSettings"]['public']);
       $language = $language->language;
       $cartData = $data["cart"];
       $cartOrder = $cartData["order"];
       $base64 = base64_encode($data['token']);
       $callbackPayload = strtr($base64, '+/=', '-_,');
       $orderInfor =  $data['storeId'].
            "/".$cartOrder["orderNumber"].
            "/?callback=".$callbackPayload;
        $orderConfirmInfor =  $data['storeId'].
            "/".$cartOrder["orderNumber"].
            "/=".$callbackPayload;    
        $url = getenv("ECWID_BASE_URL");
        $responseUrl= $url.'response/'.$orderInfor;
        $callbackUrl= $url.'confirm/'.$orderConfirmInfor;  
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
          "customer_address" => $cartOrder["billingPerson"]["street"],
          "epaycoLanguage" => $language
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
        $encryption_key = substr(CLIENT_SECRET, 0, 16);
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
        $base64url = strtr($callbackPayload, '-_,', '+/=');
        return $token = base64_decode($base64url);
   }
   
    public function updatePaymentEcwid($storeId,$orderNumber,$token, $status, $redirect=false, $amount)
    {
        // URL used to update the order via Ecwid REST API
        $url = "https://app.ecwid.com/api/v3/$storeId/orders/transaction_$orderNumber?token=$token";
        if(!$redirect ){
            if($status == 'INCOMPLETE'){
                $status="CANCELLED";
            }
            $orderData = $this->getOrderInfo($url);
            $oderAmount = json_decode($orderData);
                
            if($oderAmount->total != floatval($amount)){
                $status="CANCELLED";
            }
        }
        
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
            $returnUrl = "https://app.ecwid.com/custompaymentapps/".$storeId."?orderId=".$orderNumber."&clientId=".CLIENT_ID;
             echo "<script>window.location = '$returnUrl'</script>";
        }else{
            echo "paymentStatus ".$status;
        }

    }
    
    private function getOrderInfo($url){
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => $url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }

}