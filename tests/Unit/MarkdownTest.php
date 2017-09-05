<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Classes\Markdown;

class MarkdownTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testImages()
    {
        $image = '![image](http://image.com/image.png)';
        $this->assertNotEquals('<p><img src="http://image.com/image.png" alt="image"></p>', Markdown::render($image));
    }
}
