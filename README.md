TccAbstractModule
=================
Provides an AbstractModule class that can be extended by individual Module classes to automatically implement functionality such as autoloading and configuration.


Installation
------------
Simply add **tccltd/tcc-abstract-module** to your composer.json.


Usage
-----
When creating a new module, extend **TccAbstractModule\Module\AbstractModule** in your Module.php.  For simpler modules, you may well find that this is all you need:

    namespace MyModule;

    use TccAbstractModule\Module\AbstractModule;

    class Module extends AbstractModule
    {
    }


The abstract module configures the following behaviour automatically:

1. **Autoloading:** The classmap defined in *./autoload_classmap.php* is used in the first instance, falling back to a standard PSR-0 compatible autoloader serving files from _./src/MyModule/_.

2. **Module Configuration:** All files in _./config/_ matching the format _module.config{,.*}.php_ will be loaded.  As a matter of good practice, you should separate your routes into _module.config.routes.php_.

3. **Service Configuration:** Where previously you would have defined service manager invokables, services, factories, aliases, initializers and abstract_factories in the getServiceConfig() function of your Module.php, these should now be defined in _./config/service/service.config.php_. The format is the same. Note that all files in _./config/service/_ matching the format _service.config{,.*}.php_ will be loaded, should you wish to further subdivide your service configuration.

4. **Controller Configuration:** Where previously you would have defined controller manager invokables, services, factories, aliases, initializers and abstract_factories in the getControllerConfig() function of your Module.php, these should now be defined in _./config/service/controller.config.php_. The format is the same. Note that all files in _./config/service/_ matching the format _controller.config{,.*}.php_ will be loaded, should you wish to further subdivide your controller configuration.

5. **View Helper Configuration:** Where previously you would have defined view helper manager invokables, services, factories, aliases, initializers and abstract_factories in the getViewHelperConfig() function of your Module.php, these should now be defined in _./config/service/viewhelper.config.php_. The format is the same. Note that all files in _./config/service/_ matching the format _service.config{,.*}.php_ will be loaded, should you wish to further subdivide your view helper configuration.


A typical file structure (focusing on the aspects related to this module) might be as follows:

    module/  
      MyModule/  
        config/  
          service/  
            controller.config.php  
            service.config.php  
            viewhelper.config.php  
          module.config.php  
          module.config.routes.php  
      autoload_classmap.php  
      Module.php  

Overriding
----------
Should you wish to modify the behaviour of the AbstractModule, you can do so by either overriding in your individual Module.php files, or you can extend the entire module and create your own AbstractModule.  If you have a suggestion that might benefit all users of this module, please do feel free to suggest it, of course!
