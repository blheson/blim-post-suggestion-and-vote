<?php

namespace Model;

class WPDB
{
    /**
     * Get WP_DB instance
     */
    static function get_db()
    {
        global $wpdb;
        return $wpdb;
    }
}
