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

    /**
     * In order to provide functionality, we need to know the root directory of the Module that is extending this
     * AbstractModule. Usually, this is straightforward as the Module.php of the extending Module is stored in this
     * root directory. This is not always the case, however. For example, a developer may wish to adhere strictly to
     * PSR-0, storing Module.php in (for example) ./src/MyModule/Module.php and using a placeholder file at
     * ./Module.php that includes the PSR-0 compliant version of the file.
     *
     * Unfortunately, this makes it very hard to get the module root directory. This variable allows the developer to
     * specify the relative location of the Module's root directory in relation to the Module.php file.
     *
     * By default, we assume that Module.php is IN the module's base directory and do not set a relative path.
     *
     * @var string
     */
    protected $relativeModuleDir = '';
}
