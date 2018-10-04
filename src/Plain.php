<?php

namespace Yang\View;

/**
 * Class Plain
 * @package Yang\View
 */
class Plain extends View
{
    /**
     * @var string
     */
    protected $contentType = 'text/plain';

    /**
     * @var string
     */
    protected $cached;

    /**
     * Plain constructor.
     * @param string $content
     */
    public function __construct($content)
    {
        $this->cached = $content;
    }

    /**
     * @return string
     */
    public function getCharset()
    {
        return $this->charset;
    }

    /**
     * @return string
     */
    public function getContentType()
    {
        return $this->contentType;
    }

    /**
     * @return string
     */
    public function render()
    {
        return $this->cached;
    }
}
