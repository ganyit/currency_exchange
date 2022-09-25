<?php
use Phalcon\Mvc\Controller;
use Phalcon\Cache\Cache;
use Phalcon\Cache\AdapterFactory;
use Phalcon\Storage\SerializerFactory;

 /**
 * This index class to display landing page.
 *
 * @SpecialFeature
 */
class IndexController extends Controller
{
    public function indexAction()
    {
      return '<h1>Welcome</h1>';
    }
}