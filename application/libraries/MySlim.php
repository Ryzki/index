<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MySlim
{
    public function __construct()
    {
        require_once APPPATH.'third_party/slim/server/slim.php';
    }
}