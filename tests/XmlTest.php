<?php

namespace Yang\View\Tests;

use PHPUnit\Framework\TestCase;
use Yang\View\Xml;

/**
 * Class XmlTest
 * @package Yang\View\Tests
 */
class XmlTest extends TestCase
{
    /**
     * @var Xml
     */
    protected $view;

    /**
     * @var mixed
     */
    protected $content;

    /**
     * @var string
     */
    protected $template = '<TextXml>{{content}}</TextXml>';

    public function setUp()
    {
        $this->content = array('key' => 'value');
        $this->view = new Xml($this->content, $this->template);

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
        $this->assertEquals('text/xml', $this->view->getContentType());
    }

    public function testToString()
    {
        $xml = '';
        foreach ($this->content as $key => $value) {
            $xml .= "<{$key}>{$value}</{$key}>";
        }

        $this->assertEquals(str_replace('{{content}}', $xml, $this->template), $this->view);
    }
}
