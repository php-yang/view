<?php

namespace Yang\View\Tests;

use PHPUnit\Framework\TestCase;
use Yang\View\Plain;

/**
 * Class PlainTest
 * @package Yang\View\Tests
 */
class PlainTest extends TestCase
{
    /**
     * @var Plain
     */
    protected $view;

    /**
     * @var mixed
     */
    protected $content;

    public function setUp()
    {
        $this->content = 'Hello world!';
        $this->view = new Plain($this->content);

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
        $this->assertEquals('text/plain', $this->view->getContentType());
    }

    public function testToString()
    {
        $this->assertEquals($this->content, $this->view);
    }
}
