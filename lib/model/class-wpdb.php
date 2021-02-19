<?php

namespace Model;

class WPDB
{
    static function get_db()
    {
        global $wpdb;
        return $wpdb;
    }
}
