<?php

namespace Yang\View;

/**
 * Class Json
 * @package Yang\View
 */
class Json extends View
{
    /**
     * @var string
     */
    protected $contentType = 'application/json';

    /**
     * @var mixed
     */
    protected $content;

    /**
     * @var string
     */
    protected $cached;

    /**
     * Json constructor.
     * @param mixed $content
     */
    public function __construct($content)
    {
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function render()
    {
        if (null === $this->cached) {
            $this->cached = json_encode($this->content);
        }

        return $this->cached;
    }
}
