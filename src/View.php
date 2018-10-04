<?php

namespace Yang\View;

/**
 * Class View
 * @package Yang\View
 */
abstract class View
{
    /**
     * @var string
     */
    protected $charset = 'UTF-8';

    /**
     * @var string
     */
    protected $contentType = 'text/plain';

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
    abstract public function __toString();
}