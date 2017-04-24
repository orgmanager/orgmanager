<?php

namespace Tests\Unit;

use Parsedown;
use Tests\TestCase;
use Illuminate\Support\HtmlString;

class HelpersTest extends TestCase
{
    /**
     * Test the Markdown helper.
     *
     * @return void
     */
    public function testMarkdownHelper()
    {
        $this->assertInstanceOf(Parsedown::class, markdown());

        $this->assertInstanceOf(HtmlString::class, markdown('example'));
        $this->assertEquals('<h1>Test</h1>', markdown('# Test'));
    }
}
