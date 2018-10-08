<?php

namespace Yang\View;

use InvalidArgumentException;

/**
 * Class Template
 * @package Yang\View
 */
class Template extends View
{
    /**
     * @var string
     */
    protected $file;

    /**
     * @var array
     */
    protected $variables;

    /**
     * @var string
     */
    protected $cached;

    /**
     * Html constructor.
     * @param string $file template file path
     * @param array $variables
     */
    public function __construct($file, array $variables = array())
    {
        if (!is_file($file)) {
            throw new InvalidArgumentException('Invalid template file: ' . $file);
        }

        $this->file = $file;
        $this->variables = $variables;
    }

    /**
     * @return string
     */
    public function render()
    {
        if (null === $this->cached) {
            $render = render_include();
            $render->send($this->variables);
            $this->cached = $render->send($this->file);
            $render->next();
        }

        return $this->cached;
    }
}
