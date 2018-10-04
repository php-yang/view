<?php

namespace Yang\View;

use InvalidArgumentException;

/**
 * Class Html
 * @package Yang\View
 */
class Html extends View
{
    /**
     * @var string
     */
    protected $contentType = 'text/html';

    /**
     * @var string
     */
    protected $template;

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
     * @param string $template template file path
     * @param array $variables
     */
    public function __construct($template, array $variables = array())
    {
        if (!is_file($template)) {
            throw new InvalidArgumentException('Invalid template file: ' . $template);
        }

        $this->template = $template;
        $this->variables = $variables;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        if (null === $this->cached) {
            ob_start();

            extract($this->variables);
            include $this->template;
            $this->cached = ob_get_contents();

            ob_end_clean();
        }

        return $this->cached;
    }
}
