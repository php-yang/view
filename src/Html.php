<?php

namespace Yang\View;

/**
 * Class Html
 * @package Yang\View
 */
class Html extends View
{
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
