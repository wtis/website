<?php
namespace WebsiteBundle\Services;

class SlackApi
{
    private $hooks;

    public function __construct($hooks)
    {
        $this->hooks = $hooks;
    }

    public function enviaMensagem($text, $canal, $encode=true){
        $data_string = $encode ? json_encode(array("text" => $text)) : $text;
        $ch = curl_init($this->getHook($canal));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data_string))
        );
        $exec = curl_exec($ch);
        if (false === $exec) {
            $error = curl_error($ch);
            $errno = curl_errno($ch);
            return ["error" => [$error, $errno]];
        }
        return $exec;
    }

    public function getHook($canal){
        return isset($this->hooks[$canal]) ? $this->hooks[$canal] : false;
    }
}