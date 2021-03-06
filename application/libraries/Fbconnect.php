<?php

include(APPPATH . 'libraries/facebook/facebook.php');

class Fbconnect extends Facebook{

    public $user = NULL;
    public $user_id = NULL;
    public $fb = false;
    public $fbSession = false;
    public $appkey = 0;

    public function Fbconnect() {
        $ci = & get_instance();

        $ci->config->load('facebook', TRUE);

        $config = $ci->config->item('facebook');

        //print_r($config);
        //inheritance (panggil kelas bapa Facebook)
        parent:: __construct($config);
        
        $this->user_id = $this->getUser();
        //print_r($this->getUser());
        $me = null;
        if ($this->user_id) {

            try {
                $me = $this->api('/me');
               
                $this->user = $me;
            } catch (FacebookApiException $e) {

                error_log($e);
            }
        }
    }

    public function send_back($value) {
        return $value;
    }

    public function test() {
        $ci = & get_instance();

        //$ci->load->library('form_validation');

        $ci->load->helper('url');
        echo base_url();
    }

}