<?php

namespace TccAbstractModule\ModuleManager\Feature;

use \Zend\Stdlib\ArrayUtils;

trait ServiceConfigProviderTrait
{
    //use ClassDirTrait;
    //use ClassNamespaceTrait;

    /**
     * Return and merge controller configuration for this module from the default location of
     * ./config/service/controller.config{,.*}php.
     *
     * @return array|\Traversable
     */
    public function getServiceConfig()
    {
        $configFiles = glob(
            $this->getDir() . '/' . $this->relativeModuleDir . 'config/service/service.config{,.*}.php',
            GLOB_BRACE
        );

        $config = array();
        foreach ($configFiles as $configFile) {
            $config = ArrayUtils::merge($config, include $configFile);
        }
        return $config;
    }
}
