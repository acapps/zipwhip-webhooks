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

require_once $_SERVER['DOCUMENT_ROOT'] . '/../vendor/autoload.php';

use acapps\webhooks\models\Message;

// Retrieve POST Data
$webhookPayload = file_get_contents("php://input");

// Create a new Message Object.
$message = new Message();

// Parse the incoming JSON to our new Message Object.
$message->parseMessageJson($webhookPayload);


// Echo out the pertinant details.
echo sprintf("We received a new message:\nid: %s\nbody: %s:\nfingerprint: %s\nsource: %s\ndestination: %s",
    $message->getId(), $message->getBody(), $message->getFingerprint(), $message->getFinalSource(), $message->getFinalDestination());


// Example inbound request:
/*
curl -X POST -H "Content-Type: application/json" -H "Cache-Control: no-cache" -d '{"body":"Reply for MONITOR","bodySize":17,"visible":true,"hasAttachment":false,"dateRead":"2015-06-25T14:43:13-07:00","bcc":null,"finalDestination":"8559806848","messageType":"MO","deleted":false,"statusCode":1,"id":614187113839398912,"scheduledDate":null,"fingerprint":"1391524360","messageTransport":5,"contactId":2989191403,"address":"ptn:/6505332635","read":true,"dateCreated":"2015-06-25T14:43:13-07:00","dateDeleted":null,"dateDelivered":null,"cc":null,"finalSource":"4257772200","deviceId":274232703}' "http://localhost:10120/example.php"
*/

// Example output:
/*
We received a new message:
id: 614187113839398912
body: Reply for MONITOR:
fingerprint: 1391524360
source: 4257772200
destination: 8559806848
*/