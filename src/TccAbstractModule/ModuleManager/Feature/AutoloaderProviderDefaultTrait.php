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
        $autoloaderArray = array();

        // If this module has a defined classmap, add a classmap autoloader.
        $classmapPath = $this->getDir() . '/' . $this->relativeModuleDir . 'autoload_classmap.php';
        if (file_exists($classmapPath)) {
            $autoloaderArray['Zend\Loader\ClassMapAutoloader'] = array(
                $classmapPath
            );
        }

        // Fallback to a PSR-0 autoloader.
        $autoloaderArray['Zend\Loader\StandardAutoloader'] = array(
            'namespaces' => array(
                $this->getNamespace() =>
                    $this->getDir() . '/' . $this->relativeModuleDir . 'src/' . $this->getNamespace(),
            ),
        );

        return $autoloaderArray;
    }
}
