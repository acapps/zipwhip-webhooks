<?php
/**
 * Copyright (c) 2016 Alan Capps
 *
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE. OTHER DEALINGS IN THE SOFTWARE.
 */

namespace acapps\webhooks;


use acapps\webhooks\converters\DateConverters;

/**
 * Class DateConvertersTest
 * @package acapps\webhooks
 */
class DateConvertersTest extends \PHPUnit_Framework_TestCase
{
    use DateConverters;


    public function testNullResponseEmptyDateString()
    {
        $this->assertNull($this->stringToDate(null));
    }

    public function testTypeDateTimeValidInput()
    {
        $this->assertInstanceOf('\DateTime', $this->stringToDate('2016-05-24T20:42:06-07:00'));
    }

    public function testISO8601Formatting()
    {
        $this->assertEquals('2016-05-24T20:42:06-0700',
            $this->dateToString($this->stringToDate('2016-05-24T20:42:06-07:00'), 'ISO8601'));
    }
}
