<?php

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

class Silver_Team_Logger {
    
    public static function init() {
        if (!function_exists('silver_team_log')) {
            function silver_team_log($message, $level = 'info') {
                Silver_Team_Logger::log($message, $level);
            }
        }
    }
    
    public static function log($message, $level = 'info') {
        if (!self::is_logging_enabled()) {
            return;
        }
        
        $timestamp = current_time('Y-m-d H:i:s');
        $log_entry = "[{$timestamp}] [{$level}] {$message}" . PHP_EOL;
        
        $log_file = self::get_log_file();
        
        // Attempt to write to log file
        if ($log_file && is_writable(dirname($log_file))) {
            file_put_contents($log_file, $log_entry, FILE_APPEND | LOCK_EX);
        }
    }
    
    public static function is_logging_enabled() {
        return defined('SILVER_TEAM_DEBUG') && SILVER_TEAM_DEBUG === true;
    }
    
    private static function get_log_file() {
        $logs_dir = SILVER_TEAM_PLUGIN_DIR . 'logs';
        
        // Only create logs directory if debugging is enabled
        if (!file_exists($logs_dir)) {
            wp_mkdir_p($logs_dir);
            
            // Create .htaccess to protect logs directory
            $htaccess_file = $logs_dir . '/.htaccess';
            if (!file_exists($htaccess_file)) {
                file_put_contents($htaccess_file, "Order deny,allow\nDeny from all");
            }
        }
        
        $date = current_time('Y-m-d');
        return $logs_dir . "/silver-team-{$date}.log";
    }
    
    public static function info($message) {
        self::log($message, 'info');
    }
    
    public static function warning($message) {
        self::log($message, 'warning');
    }
    
    public static function error($message) {
        self::log($message, 'error');
    }
}