<?php

namespace Tests\Unit;

use League\CommonMark\Converter as Parser;
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
        $this->assertEquals('<h1>Test</h1>'."\n", markdown('# Test'));
    }
}
