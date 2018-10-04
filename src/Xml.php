<?php

namespace Yang\View;

/**
 * Class Xml
 * @package Yang\View
 */
class Xml extends View
{
    /**
     * @var string
     */
    protected $contentType = 'text/xml';

    /**
     * @var string
     */
    protected $template;

    /**
     * @var array|object
     */
    protected $content;

    /**
     * @var string
     */
    protected $cached;

    /**
     * Xml constructor.
     * @param array|object $content
     * @param string $template placeholder: {{content}} will be replace to xlm content
     */
    public function __construct($content, $template = '<xml>{{content}}</xml>')
    {
        $this->template = $template;
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        if (null === $this->cached) {
            $this->cached = str_replace('{{content}}', $this->buildXml($this->content), $this->template);
        }

        return $this->cached;
    }

    /**
     * @param array|object $data
     * @return string
     */
    protected function buildXml($data)
    {
        $xml = '';

        foreach ($data as $key => $value) {
            if (is_array($value) || is_object($value)) {
                $value = $this->buildXml($value);
            }

            $xml .= "<{$key}>{$value}</{$key}>";
        }

        return $xml;
    }
}
