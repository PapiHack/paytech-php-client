<?php

namespace PayTech;

use PayTech\Invoice\InvoiceItem;
use PayTech\Utils\MakeRequest;

/**
 * 
 * @author PapiHack
 * @since 07/2020
 * 
 */
abstract class PayTech 
{
    const VERSION      = "1.0.0";
    const VERSION_NAME = "PayTech API PHP Client v1 aka Naruto";

    public static function send(InvoiceItem $invoiceItem) 
    {
        $rawResponse = MakeRequest::post(Config::ROOT_URL_BASE . Config::PAYMENT_REDIRECT_PATH, [
            'item_name'    => $invoiceItem->getName(),
            'item_price'   => $invoiceItem->getPrice(),
            'command_name' => $invoiceItem->getCommandName(),
            'ref_command'  => $invoiceItem->getRefCommand(),
            'env'          => Config::getEnv(),
            'currency'     => Config::getCurrency(),
            'ipn_url'      => Config::getIpnUrl(),
            'success_url'  => Config::getIsMobile() ? Config::MOBILE_SUCCESS_URL : Config::getSuccessUrl(),
            'cancel_url'   => Config::getIsMobile() ? Config::MOBILE_CANCEL_URL : Config::getCancelUrl(),
            'custom_field' => CustomField::retrieve()
        ], [
            'API_KEY'    => Config::getApiKey(),
            'API_SECRET' => Config::getApiSecret()
        ]);

        $jsonResponse = json_decode($rawResponse, true);

        if (array_key_exists('token', $jsonResponse)) 
        {
            ApiResponse::setSuccess(1);
            ApiResponse::setToken($jsonResponse['token']);
            ApiResponse::setRedirectUrl(Config::ROOT_URL_BASE . Config::PAYMENT_REDIRECT_PATH . $jsonResponse['token']);
        }
        else if(array_key_exists('error', $jsonResponse)) 
        {
            ApiResponse::setSuccess(-1);
            ApiResponse::setErrors($jsonResponse['error']);
        }
        else 
        {
            ApiResponse::setSuccess(-1);
            ApiResponse::setErrors(['Internal Error']);
        }

    }
}