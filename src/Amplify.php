<?php

/**
 * @author: Nriagu Dubem <nriagudubem@gmail.com>
 * Date: 11/4/17
 * Time: 11:28 PM
 */
class Amplify
{
    /**
     * @var
     */
    private $merchantId;

    private $apikey;
    private $paymentUrl;
    private $redirectUrl;

    public function __construct()
    {
        $this->setAPIKey();
        $this->setMerchantId();
        $this->setPaymentUrl();
    }

    public function setMerchantId()
    {
        $this->merchantId = Config::get('amplify.merchantId');
    }

    public function setAPIKey()
    {
        $this->apikey = Config::get('amplify.apiKey');
    }

    public function setPaymentUrl()
    {
        $this->paymentUrl = Config('amplify.paymentUrl');
    }

    public function setRedirectUrl(){
        $this->redirectUrl = Config('amplify.redirectUrl');
    }
    public function getMerchantId()
    {
        return $this->merchantId;
    }

    public function getApiKey()
    {
        return $this->apikey;
    }

    public function getPaymentUrl()
    {

    }

    public function getRedirectUrl(){

    }

    public function initiatePayment()
    {
        $data = [
            'merchantId' => $this->getMerchantId(),
            'apiKey' => $this->getApiKey(),
            'transID' => $this->generateTransId(),
            'customerEmail'=> request()->email,
            'customerName'=> request()->name,
            'Amount'=> request()->amount,
            'redirectUrl' => $this->getRedirectUrl(),
            'paymentDescription' => request()->description,
            'planId'=> request()->planId
        ];

        return $this;
    }

    public function getAuthorizationUrl()
    {
        $response = $this->initiatePayment();
    }

    public function redirect()
    {

    }
}
