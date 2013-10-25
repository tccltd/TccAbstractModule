<?php

namespace TccAbstractModule\Module;

use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ControllerProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;
use Zend\ModuleManager\Feature\ViewHelperProviderInterface;

abstract class AbstractModule implements
    AutoloaderProviderInterface,
    ConfigProviderInterface,
    ControllerProviderInterface,
    ServiceProviderInterface,
    ViewHelperProviderInterface
{
    use \TccAbstractModule\ModuleManager\Feature\ClassDirTrait;
    use \TccAbstractModule\ModuleManager\Feature\ClassNamespaceTrait;
    use \TccAbstractModule\ModuleManager\Feature\AutoloaderProviderDefaultTrait;
    use \TccAbstractModule\ModuleManager\Feature\ConfigProviderTrait;
    use \TccAbstractModule\ModuleManager\Feature\ControllerConfigProviderTrait;
    use \TccAbstractModule\ModuleManager\Feature\ServiceConfigProviderTrait;
    use \TccAbstractModule\ModuleManager\Feature\ViewHelperConfigProviderTrait;
}
