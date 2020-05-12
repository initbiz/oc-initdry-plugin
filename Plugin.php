<?php namespace Initbiz\InitDry;

use System\Classes\PluginBase;
use System\Classes\PluginManager;

/**
 * InitDry Plugin Information File
 */
class Plugin extends PluginBase
{
    public function register()
    {
        $this->registerConsoleCommand('initdry.droptables', 'Initbiz\InitDry\Console\DropTables');
        $this->registerConsoleCommand('initdry.maintenance', 'Initbiz\InitDry\Console\Maintenance');
    }

    public function registerMarkupTags()
    {
        return [
            'functions' => [
                'hasPlugin' => [$this, 'hasPlugin'],
            ]
        ];
    }

    public function hasPlugin($pluginCode)
    {
        if(empty($pluginCode)) {
            return false;
        }

        $pluginManager = PluginManager::instance();

        return $pluginManager->hasPlugin($pluginCode) && !$pluginManager->isDisabled($pluginCode);
    }
}
