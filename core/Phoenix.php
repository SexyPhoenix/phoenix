<?php
namespace Core;

use Symfony\Component\HttpKernel\HttpKernel;

class Phoenix extends HttpKernel{

    // public function __construct()
    // {
    //     $matcher      = new UrlMatcher($this->getCollection(), new RequestContext());
    //     $requestStack = new RequestStack();

    //     $dispatcher   = new EventDispatcher();
    //     $dispatcher->addSubscriber(new RouterListener($matcher,  $requestStack));

    //     parent::__construct(

    //         $dispatcher,
    //         new ControllerResolver(),
    //         $requestStack,
    //         new ArgumentResolver()
    //     );
    // }

    // public function getCollection()
    // {
    //     return (
    //         new YamlFileLoader(
    //            new FileLocator(array(getcwd()))
    //         )
    //     )->load('routes/web.yaml');
    // }
}
?>