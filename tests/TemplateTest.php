<?php

namespace Yang\View\Tests;

use PHPUnit\Framework\TestCase;
use Yang\View\Template;

/**
 * Class TemplateTest
 * @package Yang\View\Tests
 */
class TemplateTest extends TestCase
{
    /**
     * @var Template
     */
    protected $view;

    /**
     * @var array
     */
    protected $variables;

    public function setUp()
    {
        $this->variables = array('name' => 'pengzhile', 'age' => 100);
        $this->view = new Template(__DIR__ . '/resources/template.phtml', $this->variables);

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
