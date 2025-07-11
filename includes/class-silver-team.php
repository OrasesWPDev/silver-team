<?php

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

class Silver_Team {
    
    private static $instance = null;
    private $updater;
    
    const VERSION = '1.0.0';
    
    private function __construct() {
        add_action('init', array($this, 'init'));
        add_action('admin_init', array($this, 'init_updater'));
        register_activation_hook(SILVER_TEAM_PLUGIN_DIR . 'silver-team.php', array($this, 'activate'));
        register_deactivation_hook(SILVER_TEAM_PLUGIN_DIR . 'silver-team.php', array($this, 'deactivate'));
        
        // Initialize logging
        $this->setup_logging();
    }
    
    public static function get_instance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    public function init() {
        silver_team_log('Silver Team plugin initialized', 'info');
    }
    
    public function init_updater() {
        if (!is_admin()) {
            return;
        }
        
        require_once SILVER_TEAM_PLUGIN_DIR . 'includes/class-simple-updater.php';
        $this->updater = new Silver_Team_Simple_Updater(SILVER_TEAM_PLUGIN_DIR . 'silver-team.php');
        $this->updater->init();
        
        silver_team_log('Silver Team updater initialized', 'info');
    }
    
    private function setup_logging() {
        require_once SILVER_TEAM_PLUGIN_DIR . 'includes/class-logger.php';
        Silver_Team_Logger::init();
    }
    
    public function activate() {
        silver_team_log('Silver Team plugin activated', 'info');
    }
    
    public function deactivate() {
        silver_team_log('Silver Team plugin deactivated', 'info');
    }
    
    public function get_version() {
        return self::VERSION;
    }
}