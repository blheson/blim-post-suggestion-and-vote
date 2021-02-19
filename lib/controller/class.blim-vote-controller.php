<?php

namespace Controller;

use Controller\Blim_Export_Controller as export;
use Model\WPDB as wpdb;

class Blim_Vote_Controller
{
    public static $wpdb;

    public static $table;

    static function get_table()
    {
        if (is_null(self::$table))
            self::$table = self::$wpdb->prefix . 'postmeta';
        return self::$table;
    }
    static function get_wpdb()
    {
        if (is_null(self::$wpdb))
            self::$wpdb = wpdb::get_db();
        return self::$wpdb;
    }
    static function get_votes($post_id, $meta_key = 'vote')
    {
        $wpdb = self::get_wpdb();
        $table = self::get_table();
        // $results = $wpdb->get_row("SELECT * FROM {$table} WHERE post_id = $post_id AND meta_key = '$meta_key'");
        $results = $wpdb->get_var($wpdb->prepare(
            "SELECT meta_value FROM $table WHERE meta_key = %s AND post_id= %d",
            $meta_key,
            $post_id
        ));
        if (is_null($results)) {
            $results = ['voteup' => 0, 'votedown' => 0];
            self::store($post_id, serialize($results));
        }

        return $results;
    }
    static function show($post_id)
    {
        $votes = self::get_votes($post_id);
        return export::vote(unserialize($votes));
    }
    static function store($post_id, $meta_value, $meta_key = 'vote')
    {
        $wpdb = self::get_wpdb();

        $wpdb->insert($wpdb->prefix . 'postmeta', array('post_id' => $post_id, 'meta_key' => $meta_key, 'meta_value' => $meta_value));
    }
    static function update($post_id, $meta_value, $meta_key = 'vote')
    {
        $wpdb = self::get_wpdb();

        $wpdb->update($wpdb->prefix . 'postmeta', array('meta_key' => $meta_key, 'meta_value' => $meta_value), array('post_id' => $post_id));
    }
}
