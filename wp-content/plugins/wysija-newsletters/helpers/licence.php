<?php
defined('WYSIJA') or die('Restricted access');
/**
 * class managing the admin vital part to integrate wordpress
 */
class WYSIJA_help_licence extends WYSIJA_help{

    function __construct(){
        parent::__construct();
    }

    /**
     *
     * @param string $source
     * @return string
     */
    function get_url_checkout($source = 'not_specified', $campaign = 'wpadmin'){
        return 'https://kb.mailpoet.com/article/158-how-to-migrate-from-version-2-to-version-3';
    }

    function check($js = false){
        // removing all the code related to updating the license key but keeping the method empty in case it is still called somewhere.
        return array();
    }


    function dkim_config(){


        //checkif the open ssl function for priv and ub key are present on that server
        $helper_toolbox = WYSIJA::get('toolbox','helper');
        $dkim_domain = $helper_toolbox->_make_domain_name(admin_url('admin.php'));
        $res1=$errorssl=false;
        if(function_exists('openssl_pkey_new')){
            while ($err = openssl_error_string());
            $res1=openssl_pkey_new(array('private_key_bits' => 1024));
            $errorssl=openssl_error_string();
        }

        if(function_exists('openssl_pkey_new') && $res1 && !$errorssl  && function_exists('openssl_pkey_get_details')){

            $rsaKey = array('private' => '', 'public' => '', 'error' => '');
            $res = openssl_pkey_new(array('private_key_bits' => 1024));

            if($res && !openssl_error_string()){
                // Get private key
                $privkey = '';
                openssl_pkey_export($res, $privkey);

                // Get public key
                $pubkey = openssl_pkey_get_details($res);


                $configData=array('dkim_domain'=>$dkim_domain,'dkim_privk'=>$privkey,'dkim_pubk'=>$pubkey['key'],'dkim_1024'=>1);

                $mConfig = WYSIJA::get('config','model');
                $mConfig->save($configData);
            }

        }
    }

}
