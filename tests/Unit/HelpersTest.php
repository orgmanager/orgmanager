<?php

namespace Tests\Unit;

use Tests\TestCase;

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
