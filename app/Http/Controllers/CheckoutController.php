<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EcwidApi\EcwidPayload;
use App\SiteProApi\SiteProPayload;

class CheckoutController extends Controller
{

    public function paymentSitePro(Request $request, SiteProPayload $site){
        
        $formattedData = $site->formatSiteProPayload($request->request->all());
        $queryParams = http_build_query($formattedData);
         $redirectUrl = getenv("URL_CHECKOUTL_ANDING") . "?" . $queryParams;
         return redirect($redirectUrl);
    }

    public function paymentEcwid (Request $request, EcwidPayload $ecwid){

      $fieldValidation = $ecwid->decryptEcwidPayload($request->request->all());
      $formattedData = $ecwid->formatEcwidPayload($fieldValidation);
      $queryParams = http_build_query($formattedData);
      $redirectUrl = getenv("URL_CHECKOUTL_ANDING") . "?" . $queryParams;

      return redirect($redirectUrl);
    }

    public function updatePaymentEcwid(Request $request, $storeId,$orderNumber,$callbackPayload)
    {
        $validationData = $request->request->all();
        $ecwidPayload = new EcwidPayload();
        $getToken = $ecwidPayload->getToken($callbackPayload);
        if(!$getToken){
            $getToken = $validationData['x_extra2'];
        }
        $status = $ecwidPayload->getPaymentStatus($validationData["x_response"]);
        $amount = $validationData["x_amount"];
       
      $ecwidPayload->updatePaymentEcwid($storeId, $orderNumber, $getToken, $status, false, $amount);
 
    }
    
    public function responseEcwid(Request $request, $storeId,$orderNumber)
    {
        $ecwidPayload = new EcwidPayload();
        $ref_payco = $_GET['ref_payco'];
        $callbackPayload = $_GET['callback'];
        $getToken = $ecwidPayload->getToken($callbackPayload);
        if(!empty($ref_payco)){
            if($ref_payco != 'undefined'){
                $response =file_get_contents('https://secure.epayco.co/validation/v1/reference/'.$ref_payco);
                $jsonData = json_decode($response);
                $validationData = (array)$jsonData->data;
                if(!$getToken){
                    $getToken = $validationData['x_extra2'];
                }
                $status = $ecwidPayload->getPaymentStatus($validationData["x_response"]); 
                $amount = $validationData["x_amount"];
            }else{
                $status = 'INCOMPLETE';
                $amount = 0;
            }
            
            $ecwidPayload->updatePaymentEcwid($storeId, $orderNumber, $getToken, $status, true, $amount);
        }
        
 
    }

    public function home() 
    {
        return view('admin.home');
    }
    
}
