# Silver Team Plugin Development Notes

## Plugin Structure
- Main plugin file: `silver-team.php`
- Main plugin class: `includes/class-silver-team.php`
- Error logging: `includes/class-logger.php`
- Auto-updater: `includes/class-simple-updater.php`
- Plugin Update Checker: `includes/vendor/plugin-update-checker/`

## Auto-Updater Configuration
- Uses YahnisElsts Plugin Update Checker v5.6
- GitHub repository: https://github.com/OrasesWPDev/silver-team
- Update check period: 1 minute
- Requires exact version match between plugin and GitHub release tag

## Error Logging
- Controlled by `SILVER_TEAM_DEBUG` constant
- Logs stored in `/logs/` directory (created dynamically when needed)
- Daily log files: `silver-team-YYYY-MM-DD.log`
- Protected by `.htaccess` file
- Available logging levels: info, warning, error
- Global function: `silver_team_log($message, $level)`

## Development Notes
- Plugin uses singleton pattern for main class
- Logging directory is created dynamically only when debugging is enabled
- Plugin will work seamlessly whether debugging is on or off
- Auto-updater initializes only in admin context
- Version constant: `SILVER_TEAM_VERSION`

## Version Management
- Current version: 1.0.0
- Version should be updated in:
  - `silver-team.php` (plugin header and constant)
  - `includes/class-silver-team.php` (VERSION constant)
  - GitHub release tag (for auto-updater)