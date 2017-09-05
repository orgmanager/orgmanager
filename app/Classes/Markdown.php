<?php

namespace App\Classes;

use League\CommonMark\Environment;
use League\CommonMark\CommonMarkConverter;
use League\CommonMark\Inline\Element\Image;

class Markdown
{
    public static function render(string $markdown)
    {
        $environment = Environment::createCommonMarkEnvironment();

        $environment->addInlineRenderer(Image::class, new ImageRenderer());

        $config = ['html_input' => 'escape'];

        $converter = new CommonMarkConverter($config, $environment);

        return $converter->convertToHtml($markdown);
    }
}
