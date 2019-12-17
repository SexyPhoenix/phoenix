<?php
namespace Core;

use Symfony\Component\DependencyInjection;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Routing\Loader\YamlFileLoader;
use Symfony\Component\Config\FileLocator;

$app = new ContainerBuilder();
$app->register('context', 'Symfony\Component\Routing\RequestContext');
$app->register('matcher', 'Symfony\Component\Routing\Matcher\UrlMatcher')
    ->setArguments(array(getCollection(), new Reference('context')));

$app->register('request_stack', 'Symfony\Component\HttpFoundation\RequestStack');
$app->register('controller_resolver', 'Symfony\Component\HttpKernel\Controller\ControllerResolver');
$app->register('argument_resolver', 'Symfony\Component\HttpKernel\Controller\ArgumentResolver');
    
$app->register('listener.router', 'Symfony\Component\HttpKernel\EventListener\RouterListener')
    ->setArguments(array(new Reference('matcher'), new Reference('request_stack')));

$app->register('dispatcher', 'Symfony\Component\EventDispatcher\EventDispatcher')
    ->addMethodCall('addSubscriber', array(new Reference('listener.router')));            

$app->register('phoenix', 'Core\Phoenix')
->setArguments(array(
    new Reference('dispatcher'),
    new Reference('controller_resolver'),
    new Reference('request_stack'),
    new Reference('argument_resolver'),
));


return $app;

function getCollection()
{
    return (
        new YamlFileLoader(
           new FileLocator(array(getcwd()))
        )
    )->load('routes/web.yaml');
}
?>