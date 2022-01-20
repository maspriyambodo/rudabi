<?php

defined('BASEPATH') OR exit('trying to signin backdoor??');

class Phpinfo extends CI_Controller {

    public function index() {
        phpinfo();
    }

}
