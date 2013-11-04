<?php

namespace TccAbstractModule\ModuleManager\Feature;

use \Zend\Stdlib\ArrayUtils;

trait ConfigProviderTrait
{
    //use ClassDirTrait;
    //use ClassNamespaceTrait;

    /**
     * Return and merge configuration for this module from the default location of ./config/module.config{,.*}php.
     *
     * @return array|\Traversable
     */
    public function getConfig()
    {
        $configFiles = glob(
            $this->getDir() . '/' . $this->relativeModuleDir . 'config/module.config{,.*}.php',
            GLOB_BRACE
        );

        // glob() returns false on error. On some systems, glob() will return false (instead of an empty array) if no
        // files are found. Treat both in the same way - no config will be loaded.
        $configFiles = $configFiles ?: array();

        $config = array();
        foreach ($configFiles as $configFile) {
            $config = ArrayUtils::merge($config, include $configFile);
        }
        return $config;
    }
}
