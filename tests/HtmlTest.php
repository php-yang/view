<?php

namespace Yang\View\Tests;

use PHPUnit\Framework\TestCase;
use Yang\View\Html;

/**
 * Class HtmlTest
 * @package Yang\View\Tests
 */
class HtmlTest extends TestCase
{
    /**
     * @var Html
     */
    protected $view;

    /**
     * @var mixed
     */
    protected $content;

    public function setUp()
    {
        $this->content = 'Hello world!';
        $this->view = new Html($this->content);

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
        $this->assertEquals('text/html', $this->view->getContentType());
    }

    public function testToString()
    {
        $this->assertEquals($this->content, $this->view->render());
    }
}
