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
     * @var array
     */
    protected $variables;

    public function setUp()
    {
        $this->variables = array('name' => 'pengzhile', 'age' => 100);
        $this->view = new Html(__DIR__ . '/resources/template.phtml', $this->variables);

        parent::setUp();
    }

    public function tearDown()
    {
        unset($this->variables, $this->view);

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
        $this->assertEquals('<span>' . $this->variables['name'] . '</span>', $this->view->render());
    }
}
