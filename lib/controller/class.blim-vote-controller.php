<?php

namespace Controller;

use Controller\Blim_Export_Controller as export;
use Model\WPDB as wpdb;

class Blim_Vote_Controller
{
    public static $wpdb;

    public static $table;
    /**
     * Get table name for post meta
     * @return strin
     */
    static function get_table()
    {
        if (is_null(self::$table))
            self::$table = self::$wpdb->prefix . 'postmeta';
        return self::$table;
    }
    /**
     * Get the insance of WP_DB
     * @return global $wpdb
     */
    static function get_wpdb()
    {
        if (is_null(self::$wpdb))
            self::$wpdb = wpdb::get_db();
        return self::$wpdb;
    }
    /**
     * Get vote data from database
     * @param int $post_id
     * @param string $meta_key
     * @return array
     */
    static function get_votes( $post_id, $meta_key = 'vote' )
    {

        if ((int) $post_id < 1 )
            $post_id = get_the_ID();
    
        $wpdb = self::get_wpdb();
        $table = self::get_table();

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
    /**
     * Get and show vote to public facing page
     * @param int $post_id 
     * @return string
     */
    static function show( $post_id )
    {
        $votes = self::get_votes( $post_id );

        if (is_string( $votes ))
            $votes =  unserialize( $votes );

        return export::vote( $votes );
    }
    /**
     * Save new meta value to post
     * @param int $post_id
     * @param string $meta_value Serialized array of vote up and vote down values
     * @param string $meta_key post
     */
    static function store( $post_id, $meta_value, $meta_key = 'vote' )
    {
        $wpdb = self::get_wpdb();

        $wpdb->insert( $wpdb->prefix . 'postmeta', array( 'post_id' => $post_id, 'meta_key' => $meta_key, 'meta_value' => $meta_value));
    }
    /**
     * Update post meta
     * @return void
     */
    static function update()
    {
        $meta_key = 'vote';
        $vote_up = (int)$_REQUEST['vote_up'];
        $vote_down = (int)$_REQUEST['vote_down'];
        $post_id = (int) $_REQUEST['post_id'];
        $wpdb = self::get_wpdb();
        $meta_value = serialize(array('voteup' => $vote_up, 'votedown' => $vote_down));

        $res = $wpdb->update( $wpdb->prefix . 'postmeta',
            array('meta_value' => $meta_value),
            array('post_id' => $post_id, 'meta_key' => $meta_key)
        );
        echo self::json_output($res);
        exit;
    }
    /**
     * Response output for vote ajax request
     * @param int $res Result of WP_DB update method
     */
    static function json_output( $res )
    {
        //response output
        header("Content-Type: application/json");

        $message = (false === $res) ? json_encode(['error' => 'Vote was not successful']) : (
            (0 == $res) ?
            json_encode(['success' => 'Thank you for voting, but your vote was not counted.']) :
            json_encode(['success' => 'Thank you for voting.']));

        if ( false === $res )
            http_response_code(404);

        return $message;
    }
}
