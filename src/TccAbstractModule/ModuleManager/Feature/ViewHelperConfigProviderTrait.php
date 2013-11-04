<?php

namespace TccAbstractModule\ModuleManager\Feature;

use \Zend\Stdlib\ArrayUtils;

trait ViewHelperConfigProviderTrait
{
    //use ClassDirTrait;
    //use ClassNamespaceTrait;

    /**
     * Return and merge viewhelper configuration for this module from the default location of
     * ./config/service/viewhelper.config{,.*}php.
     *
     * @return array|\Traversable
     */
    public function getViewHelperConfig()
    {
        $configFiles = glob(
            $this->getDir() . '/' . $this->relativeModuleDir . 'config/service/viewhelper.config{,.*}.php',
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
