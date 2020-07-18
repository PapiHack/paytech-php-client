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
    const VERSION      = "1.0.2";
    const VERSION_NAME = "PayTech PHP SDK Client v1 aka Naruto";

    public static function send(InvoiceItem $invoiceItem) 
    {
        $response = MakeRequest::post(Config::ROOT_URL_BASE . Config::PAYMENT_REQUEST_PATH, [
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
        ], []);

        // @codeCoverageIgnoreStart
        if (array_key_exists('token', $response)) 
        {
            ApiResponse::setSuccess(1);
            ApiResponse::setToken($response['token']);
            ApiResponse::setRedirectUrl(Config::ROOT_URL_BASE . Config::PAYMENT_REDIRECT_PATH . $response['token']);
        }
        else if(array_key_exists('error', $response)) 
        {
            ApiResponse::setSuccess(-1);
            ApiResponse::setErrors($response['error']);
        }
        else if(array_key_exists('message', $response)) 
        {
            ApiResponse::setSuccess(-1);
            ApiResponse::setErrors($response['message']);
        }
        else 
        {
            ApiResponse::setSuccess(-1);
            ApiResponse::setErrors(['Internal Error']);
        }
        // @codeCoverageIgnoreEnd

    }
}