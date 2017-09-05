<?php

use App\Classes\Markdown;

if (! function_exists('markdown')) {
    /**
     * Parse a Markdown formatted string into HTML.
     *
     * @param  string  $input
     * @return string
     */
    function markdown(string $markdown) : string
    {
        return Markdown::render($markdown);
    }
}
