<?php

namespace Yang\View\Tests;

use PHPUnit\Framework\TestCase;
use Yang\View\Json;

/**
 * Class JsonTest
 * @package Yang\View\Tests
 */
class JsonTest extends TestCase
{
    /**
     * @var Json
     */
    protected $view;

    /**
     * @var mixed
     */
    protected $content;

    public function setUp()
    {
        $this->content = array('key' => 'value', 'arr' => array('name' => 'pengzhile'));
        $this->view = new Json($this->content);

        parent::setUp();
    }

    public function tearDown()
    {
        unset($this->content, $this->view);

        parent::tearDown();
    }

    public function testCharset()
    {
        $this->assertEquals('UTF-8', $this->view->getCharset());
    }

    public function testContentType()
    {
        $this->assertEquals('application/json', $this->view->getContentType());
    }

    public function testToString()
    {
        $this->assertEquals(json_encode($this->content), $this->view);
    }
}
