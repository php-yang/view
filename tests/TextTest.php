<?php

namespace Yang\View\Tests;

use PHPUnit\Framework\TestCase;
use Yang\View\Text;

/**
 * Class TextTest
 * @package Yang\View\Tests
 */
class TextTest extends TestCase
{
    /**
     * @var Text
     */
    protected $view;

    /**
     * @var mixed
     */
    protected $content;

    public function setUp()
    {
        $this->content = 'Hello text!';
        $this->view = new Text($this->content);

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
