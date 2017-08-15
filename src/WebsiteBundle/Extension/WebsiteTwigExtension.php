<?php

namespace WebsiteBundle\Extension;

class WebsiteTwigExtension extends \Twig_Extension {

    public function getFilters() {
        return array(
            new \Twig_SimpleFilter('var_dump','var_dump'),
            'json_encode_slashes' => new \Twig_SimpleFilter('jsonEncodeSlashes', array($this, 'jsonEncodeSlashes')),
            'test_object' => new \Twig_SimpleFilter('testObject', array($this, 'testObject')),
            'base64' => new \Twig_SimpleFilter('base64', array($this, 'base64')),
        );
    }

    public function jsonEncodeSlashes($obj) {
        return addslashes(json_encode($obj));
    }
    
    public function testObject($objectId, $ids){
        if( in_array($objectId, $ids) ){
            return true;
        } else{
            return false;
        }
    }
    
    public function base64($string){
        return base64_encode($string);
    }

    public function getName() {
        return 'website_twig_extension';
    }

}

?>
