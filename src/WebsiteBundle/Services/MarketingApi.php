<?php

namespace WebsiteBundle\Services;

use Mautic\MauticApi;
use Mautic\Auth\ApiAuth;
use Symfony\Component\BrowserKit\Response;

class MarketingApi
{

    static $auth;
    static $api;
    private $settings;
    private $apiUrl;

    public function __construct($settings)
    {

        $this->apiUrl = $settings['url'];
        $this->settings = array(
            'userName' => $settings['username'],
            'password' => $settings['password']
        );

        // Initiate the auth object specifying to use BasicAuth
        if (!isset(self::$auth)) {
            $initAuth = new ApiAuth();
            self::$auth = $initAuth->newAuth($this->settings, 'BasicAuth');
        }
    }

    public function getApi($context)
    {
        if (!isset(self::$api[$context])) {
            $api = new MauticApi();
            self::$api[$context] = $api->newApi($context, self::$auth, $this->apiUrl);
        }
        return self::$api[$context];
    }

    public function enviaEmail($emailid, $contactid)
    {
        $emailApi = $this->getApi("emails");
        return $emailApi->sendToContact($emailid, $contactid);
    }

    /*public function listaCampanhas($searchFilter = null, $start = null, $limit = null, $orderBy = null, $orderByDir = null, $publishedOnly = null, $minimal = null)
    {
        return $this->getApi("campaigns")
            ->getList(
                $searchFilter,
                $start,
                $limit,
                $orderBy,
                $orderByDir,
                $publishedOnly,
                $minimal
            );
    }*/

    public function listaContatos($searchFilter, $start=null, $limit=null, $orderBy=null, $orderByDir=null, $publishedOnly=null, $minimal=true){
        $api = $this->getApi("contacts");
        return $api->getList($searchFilter, $start, $limit, $orderBy, $orderByDir, $publishedOnly, $minimal);
    }

    public function criaContato($data){
        $api = $this->getApi("contacts");
        return $api->create($data);
    }

    public function atualizaContato($id, $data, $forceCreate=true){
        $api = $this->getApi("contacts");
        return $api->edit($id, $data, $forceCreate);
    }

    public function adicionaContatoSeguimento($segmentId, $contactId){
        $api = $this->getApi("segments");
        $response = $api->addContact($segmentId, $contactId);
        if (!isset($response['success'])) {
            // handle error
            return false;
        }
        return $response;
    }

}