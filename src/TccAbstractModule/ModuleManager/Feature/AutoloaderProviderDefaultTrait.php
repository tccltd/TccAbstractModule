<?php

namespace TccAbstractModule\ModuleManager\Feature;

trait AutoloaderProviderDefaultTrait {
    //use ClassDirTrait;
    //use ClassNamespaceTrait;

    /**
     * Return an array to configure a default autoloader instance.
     *
     * @return array
     */
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                $this->getDir() . '/' . $this->relativeModuleDir . 'autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    $this->getNamespace() =>
                        $this->getDir() . '/' . $this->relativeModuleDir . 'src/' . $this->getNamespace(),
                ),
            ),
        );
    }
}
