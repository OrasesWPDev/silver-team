<?php

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

class Silver_Team_Simple_Updater {
    
    private $plugin_file;
    private $updater;
    
    public function __construct($plugin_file) {
        $this->plugin_file = $plugin_file;
    }
    
    public function init() {
        if (!is_admin()) {
            return;
        }
        
        // Load the update checker library
        if (file_exists(SILVER_TEAM_PLUGIN_DIR . 'includes/vendor/plugin-update-checker/plugin-update-checker.php')) {
            require_once SILVER_TEAM_PLUGIN_DIR . 'includes/vendor/plugin-update-checker/plugin-update-checker.php';
            
            try {
                $this->updater = Puc_v4_Factory::buildUpdateChecker(
                    'https://github.com/OrasesWPDev/silver-team',
                    $this->plugin_file,
                    'silver-team'
                );
                
                // Enable release assets for GitHub
                $this->updater->getVcsApi()->enableReleaseAssets();
                
                // Set update check period (in minutes)
                $this->updater->setUpdateCheckPeriod(1);
                
                silver_team_log('Silver Team updater initialized successfully', 'info');
                
            } catch (Exception $e) {
                silver_team_log('Failed to initialize updater: ' . $e->getMessage(), 'error');
            }
        } else {
            silver_team_log('Plugin Update Checker library not found', 'warning');
        }
    }
    
    public function force_update_check() {
        if ($this->updater) {
            try {
                $result = $this->updater->checkForUpdates();
                silver_team_log('Force update check completed', 'info');
                return $result;
            } catch (Exception $e) {
                silver_team_log('Force update check failed: ' . $e->getMessage(), 'error');
                return false;
            }
        }
        return false;
    }
    
    public function manual_update_check() {
        if ($this->updater) {
            try {
                $result = $this->updater->requestInfo();
                silver_team_log('Manual update check completed', 'info');
                return $result;
            } catch (Exception $e) {
                silver_team_log('Manual update check failed: ' . $e->getMessage(), 'error');
                return false;
            }
        }
        return false;
    }
    
    public function get_status() {
        if ($this->updater) {
            try {
                $update = $this->updater->getUpdate();
                $status = array(
                    'has_update' => !empty($update),
                    'current_version' => SILVER_TEAM_VERSION,
                    'latest_version' => $update ? $update->version : SILVER_TEAM_VERSION,
                    'update_available' => !empty($update)
                );
                return $status;
            } catch (Exception $e) {
                silver_team_log('Failed to get updater status: ' . $e->getMessage(), 'error');
                return array('error' => $e->getMessage());
            }
        }
        return array('error' => 'Updater not initialized');
    }
}