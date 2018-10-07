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
        $this->cached = (string)$content;
    }

    /**
     * @return string
     */
    public function render()
    {
        return $this->cached;
    }
}
