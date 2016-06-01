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

namespace acapps;


use acapps\webhooks\models\Message;

/**
 * Class MessageTest
 * @package acapps
 */
class MessageTest extends \PHPUnit_Framework_TestCase
{
    const exampleInput = '{"body":"Test body","bodySize":9,"visible":true,"hasAttachment":false,"dateRead":"2016-05-24T20:42:06-07:00","bcc":null,"finalDestination":"4257772300","messageType":"ZO","deleted":false,"statusCode":6,"id":453714974911832064,"scheduledDate":null,"fingerprint":"8982349","messageTransport":5,"contactId":2428978123,"address":"ptn:/4257772300","read":true,"dateCreated":"2016-05-24T20:42:06-07:00","dateDeleted":null,"dateDelivered":null,"cc":null,"finalSource":"8448982526","deviceId":314450216}';
    const exampleOutput = '{"id":"453714974911832064","deviceId":"314450216","fingerprint":"8982349","contactId":"2428978123","finalDestination":"4257772300","finalSource":"8448982526","address":"ptn:\/4257772300","bcc":"","cc":"","messageType":"ZO","body":"Test body","bodySize":9,"statusCode":6,"hasAttachment":false,"deleted":false,"read":true,"visible":true,"dateCreated":"2016-05-24T20:42:06-0700","dateDeleted":null,"dateRead":null,"scheduledDate":null}';
    const defaultEmptyMessage = '{"id":"","deviceId":"","fingerprint":"","contactId":"","finalDestination":"","finalSource":"","address":"","bcc":"","cc":"","messageType":"","body":"","bodySize":0,"statusCode":0,"hasAttachment":false,"deleted":false,"read":false,"visible":true,"dateCreated":null,"dateDeleted":null,"dateRead":null,"scheduledDate":null}';

    public function testMessageIsTypeModel()
    {
        $message = new Message();

        $this->assertInstanceOf('acapps\webhooks\models\Model', $message);
    }

    public function testEmptyMessagePayloadAsJson()
    {
        $message = new Message();
        $message->parseMessageJson(array());

        $this->assertEquals($this::defaultEmptyMessage, json_encode($message));
    }

    public function testFullMessagePayloadAsJson()
    {
        $message = new Message();
        $message->parseMessageJson($this::exampleInput);

        $this->assertEquals($this::exampleOutput, json_encode($message));
    }

    public function testISO8601DateFormatting()
    {
        $message = new Message();
        $message->setScheduledDateFromString('2016-05-24T20:42:06-07:00');

        $this->assertEquals('2016-05-24T20:42:06-0700', $message->getScheduledDateAsString());
    }
}
