<?php

namespace Yang\View\Tests;

use PHPUnit\Framework\TestCase;
use Yang\View\Debug;

/**
 * Class DebugTest
 * @package Yang\View\Tests
 */
class DebugTest extends TestCase
{
    /**
     * @var Debug
     */
    protected $view;

    /**
     * @var mixed
     */
    protected $content;

    public function setUp()
    {
        $this->content = array('key' => 'value');
        $this->view = new Debug($this->content);

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
        $template = '<!DOCTYPE html><html><head><meta charset="UTF-8"><title>Debug Page</title></head><body><pre>{{content}}</pre></body></html>';

        $this->assertEquals(str_replace('{{content}}', var_export($this->content, true), $template), $this->view->render());
    }
}
