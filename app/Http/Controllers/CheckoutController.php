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
        //var_dump($queryParams);
        //die();
         $redirectUrl = getenv("BASE_URL_SITE_PRO") . "?" . $queryParams;
         return redirect($redirectUrl);
    }

    public function paymentEcwid (Request $request, EcwidPayload $ecwid){

      $fieldValidation = $ecwid->decryptEcwidPayload($request->request->all());
      $formattedData = $ecwid->formatEcwidPayload($fieldValidation);
      $queryParams = http_build_query($formattedData);
        //var_dump($queryParams);
        //die();
      $redirectUrl = getenv("URL_ECWID_LANDING") . "?" . $queryParams;

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
       
      $ecwidPayload->updatePaymentEcwid($storeId, $orderNumber, $getToken, $status);
 
    }
    
    public function responseEcwid(Request $request, $storeId,$orderNumber,$callbackPayload)
    {
        $ecwidPayload = new EcwidPayload();
        $getToken = $ecwidPayload->getToken($callbackPayload);
        $ref_payco = $_GET['ref_payco'];
        if(!empty($ref_payco)){
            $response =file_get_contents('https://secure.epayco.co/validation/v1/reference/'.$ref_payco);
            $jsonData = json_decode($response);
            $validationData = (array)$jsonData->data;
            if(!$getToken){
                $getToken = $validationData['x_extra2'];
            }
            $status = $ecwidPayload->getPaymentStatus($validationData["x_response"]);
            $ecwidPayload->updatePaymentEcwid($storeId, $orderNumber, $getToken, $status, true);
        }
        
 
    }

    public function home(Request $request) 
    {
        // Get the payload data
        $storeId = 43658503;
        // Display the app home screen
        return view(
            'embedded.home', 
            [
                'storeId' => $storeId,
                'appNamespace' => '"custom-app-43658503-5",'
            ]
        );
    }
    
}
