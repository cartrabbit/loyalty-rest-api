<?php
namespace CartRabbit\LoyaltyRestApi\Controllers;

class Users extends \WP_REST_Controller {
    protected $namespace = 'flycart-loyalty-points/v1';
    /**
     * Route base.
     *
     * @var string
     */
    protected $rest_base = 'users';

    public function __construct() {
    }

    public function register_routes()
    {
        register_rest_route($this->namespace, '/' . $this->rest_base.'/(?P<id>[\d]+)', array(
            array(
                'methods' => \WP_REST_Server::READABLE,
                'callback' => array($this, 'AddPoint'),
            ),
            array(
                'methods' => \WP_REST_Server::CREATABLE,
                'callback' => array($this, 'ReducePoint'),
            )
        ));
    }
}