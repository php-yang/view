<?php

namespace Yang\View;

/**
 * Class Debug
 * @package Yang\View
 */
class Debug extends View
{
    /**
     * @var string
     */
    protected $template = '<!DOCTYPE html><html><head><meta charset="UTF-8"><title>Debug Page</title></head><body><pre>{{content}}</pre></body></html>';

    /**
     * @var mixed
     */
    protected $content;

    /**
     * @var string
     */
    protected $cached;

    /**
     * Debug constructor.
     * @param mixed $content
     * @param null|string $template placeholder: {{content}} will be replace to xlm content
     */
    public function __construct($content, $template = null)
    {
        if (null !== $template) {
            $this->template = $template;
        }

        $this->content = $content;
    }

    /**
     * @return string
     */
    public function render()
    {
        if (null === $this->cached) {
            $this->cached = str_replace('{{content}}', $this->dump($this->content), $this->template);
        }

        return $this->cached;
    }

    /**
     * @param mixed $variable
     * @return string
     */
    public function dump($variable)
    {
        ob_start();
        var_dump($variable);
        $content = ob_get_contents();
        ob_end_clean();

        return $content;
    }
}
