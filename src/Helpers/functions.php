<?php

if (!function_exists('render_include')) {
    /**
     * @return Generator
     */
    function render_include()
    {
        ob_start();
        try {
            include yield extract(yield);
            yield ob_get_contents();
        } finally {
            ob_end_clean();
        }
    }
}
