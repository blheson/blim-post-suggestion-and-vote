<?php
Namespace Controller;

class BlimOptionController{
    function __controller(){

    }
    static function add_option($option='blimfeature',$value=''){
        add_option($option);
    }
}