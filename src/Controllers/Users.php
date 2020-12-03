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
                'methods' => \WP_REST_Server::EDITABLE,
                'callback' => array($this, 'UpdatePoint'),
            )
        ));
    }

    function UpdatePoint($request){
        $response = array(
            'id' => 3,
            'name' => 'alex'
        );
        return rest_ensure_response( $response );
    }
}