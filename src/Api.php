<?php
namespace CartRabbit\LoyaltyRestApi;
use CartRabbit\LoyaltyRestApi\Utilities\InstanceTrait;
class Api{
    use InstanceTrait;
    /**
     * REST API namespaces and endpoints.
     *
     * @var array
     */
    protected $controllers = array();

    /**
     * Hook into WordPress ready to init the REST API as needed.
     */
    public function init() {
        add_action( 'rest_api_init', array( $this, 'register_rest_routes' ), 10 );
    }

    /**
     * Register REST API routes.
     */
    public function register_rest_routes() {
        foreach ( $this->get_rest_namespaces() as $namespace => $controllers ) {
            foreach ( $controllers as $controller_name => $controller_class ) {
                $this->controllers[ $namespace ][ $controller_name ] = new $controller_class();
                $this->controllers[ $namespace ][ $controller_name ]->register_routes();
            }
        }
    }

    /**
     * Get API namespaces - new namespaces should be registered here.
     *
     * @return array List of Namespaces and Main controller classes.
     */
    protected function get_rest_namespaces() {
        return apply_filters(
            'wlpr_rest_api_get_rest_namespaces',
            array(
                'flycart-loyalty-points/v1' => $this->get_v1_controllers()
            )
        );
    }

    /**
     * List of controllers in the wc/v1 namespace.
     *
     * @return array
     */
    protected function get_v1_controllers() {
        return array(
            'users'                  => '\CartRabbit\LoyaltyRestApi\Controllers\Users'
        );
    }

    /**
     * Return the path to the package.
     *
     * @return string
     */
    public static function get_path() {
        return dirname( __DIR__ );
    }
}