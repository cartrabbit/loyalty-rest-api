<?php
namespace CartRabbit\LoyaltyRestApi\Utilities;

/**
 * Instance trait.
 */
trait InstanceTrait {
    /**
     * The instance of the class.
     *
     * @var object
     */
    protected static $instance = null;

    /**
     * Constructor
     *
     * @return void
     */
    protected function __construct() {}

    /**
     * Get class instance.
     *
     * @return object Instance.
     */
    final public static function instance() {
        if ( null === static::$instance ) {
            static::$instance = new static();
        }
        return static::$instance;
    }

    /**
     * Prevent cloning.
     */
    private function __clone() {}

    /**
     * Prevent unserializing.
     */
    final public function __wakeup() {
        wc_doing_it_wrong( __FUNCTION__, __( 'Unserializing instances of this class is forbidden.', WLPR_TEXT_DOMAIN ), WLPR_PLUGIN_VERSION );
        die();
    }
}
