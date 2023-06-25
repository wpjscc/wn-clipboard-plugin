<?php namespace Wpjscc\Clipboard;

use Backend;
use Backend\Models\UserRole;
use System\Classes\PluginBase;

/**
 * wn-clipboard-plugin Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     */
    public function pluginDetails(): array
    {
        return [
            'name'        => 'wpjscc.wn-clipboard-plugin::lang.plugin.name',
            'description' => 'wpjscc.wn-clipboard-plugin::lang.plugin.description',
            'author'      => 'wpjscc',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     */
    public function register(): void
    {
        \Event::listen('backend.page.beforeDisplay', function (\Backend\Classes\Controller $backendController, $action, $params) {
           $backendController->addJs('plugins/wpjscc/clipboard/assets/js/copy-to-clipboard.js');
        });
    }

    /**
     * Boot method, called right before the request route.
     */
    public function boot(): void
    {
        

    }

    /**
     * Registers any frontend components implemented in this plugin.
     */
    public function registerComponents(): array
    {
        return []; // Remove this line to activate

        return [
            'Wpjscc\WnClipboardPlugin\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * Registers any backend permissions used by this plugin.
     */
    public function registerPermissions(): array
    {
        return []; // Remove this line to activate

        return [
            'wpjscc.wn-clipboard-plugin.some_permission' => [
                'tab' => 'wpjscc.wn-clipboard-plugin::lang.plugin.name',
                'label' => 'wpjscc.wn-clipboard-plugin::lang.permissions.some_permission',
                'roles' => [UserRole::CODE_DEVELOPER, UserRole::CODE_PUBLISHER],
            ],
        ];
    }

    /**
     * Registers backend navigation items for this plugin.
     */
    public function registerNavigation(): array
    {
        return []; // Remove this line to activate

        return [
            'wn-clipboard-plugin' => [
                'label'       => 'wpjscc.wn-clipboard-plugin::lang.plugin.name',
                'url'         => Backend::url('wpjscc/wn-clipboard-plugin/mycontroller'),
                'icon'        => 'icon-leaf',
                'permissions' => ['wpjscc.wn-clipboard-plugin.*'],
                'order'       => 500,
            ],
        ];
    }
}
