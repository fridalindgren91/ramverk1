<?php

namespace Anax\Controller;

use Anax\DI\DIFactoryConfig;
use PHPUnit\Framework\TestCase;

/**
 * Test the SampleController.
 */
class FridaControllerTest extends TestCase
{
    public function testIndexAction()
    {
        $controller = new FridaController();
        $controller->initialize();
        $res = $controller->indexAction();
        $this->assertContains("db is active", $res);
    }

    public function testJsonActionGet()
    {
        global $di;

        $di = new DIFactoryConfig();
        $di->loadServices(ANAX_INSTALL_PATH . "/config/di");

        $di->get("cache")->setPath(ANAX_INSTALL_PATH . "/test/cache");

        $controller = new FridaController();
        $controller->setDI($di);
        $controller->initialize();

        $res = $controller->jsonActionGet();
        $this->assertIsArray($res);
        $this->assertArrayHasKey("message", $res[0]);
        $this->assertContains("di contains", $res[0]["message"]);
        $this->assertArrayHasKey("di", $res[0]);
        $this->assertContains("configuration", $res[0]["di"]);
        $this->assertContains("request", $res[0]["di"]);
        $this->assertContains("response", $res[0]["di"]);
    }

    public function testPageActionGet()
    {
        global $di;

        $di = new DIFactoryConfig();
        $di->loadServices(ANAX_INSTALL_PATH . "/config/di");

        $di->get("cache")->setPath(ANAX_INSTALL_PATH . "/test/cache");

        $controller = new FridaController();
        $controller->setDI($di);
        $controller->initialize();

        $res = $controller->pageActionGet();
        $this->assertIsObject($res);
        $this->assertInstanceOf("Anax\Response\Response", $res);
        $this->assertInstanceOf("Anax\Response\ResponseUtility", $res);

        $body = $res->getBody();
        $this->assertContains("Hello", $body);
    }
}
