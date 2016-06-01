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


namespace acapps\converters;


use acapps\Loggable;
use acapps\models\Message;

trait JsonToMessage
{
    public function parseMessage($json, Message $message)
    {
        if (empty($json)) {
            return $message;
        }

        $messageBody = json_decode($json, true);

        if (json_last_error() > 0) {
            return $message;
        }

        $message->setId($this->checkArray($messageBody, 'id'));
        $message->setDeviceId($this->checkArray($messageBody, 'deviceId'));
        $message->setFingerprint($this->checkArray($messageBody, 'fingerprint'));
        $message->setContactId($this->checkArray($messageBody, 'contactId'));
        $message->setFinalDestination($this->checkArray($messageBody, 'finalDestination'));
        $message->setFinalSource($this->checkArray($messageBody, 'finalSource'));
        $message->setAddress($this->checkArray($messageBody, 'address'));
        $message->setBcc($this->checkArray($messageBody, 'bcc'));
        $message->setCc($this->checkArray($messageBody, 'cc'));
        $message->setMessageType($this->checkArray($messageBody, 'messageType'));
        $message->setBody($this->checkArray($messageBody, 'body'));
        $message->setBodySize($this->checkArray($messageBody, 'bodySize'));
        $message->setStatusCode($this->checkArray($messageBody, 'statusCode'));
        $message->setHasAttachment($this->checkArray($messageBody, 'hasAttachment'));
        $message->setDeleted($this->checkArray($messageBody, 'deleted'));
        $message->setRead($this->checkArray($messageBody, 'read'));
        $message->setVisible($this->checkArray($messageBody, 'visible'));
        $message->setDateCreatedFromString($this->checkArray($messageBody, 'dateCreated'));
        $message->setDateDeletedFromString($this->checkArray($messageBody, 'dateDeleted'));
        $message->setDateReadFromString($this->checkArray($messageBody, 'dateRead'));
        $message->setScheduledDateFromString($this->checkArray($messageBody, 'scheduledDate'));

        return $message;
    }

    /**
     * Returns null
     * @param array $input
     * @param       $key
     * @return string|null
     */
    private function checkArray(array $input, $key)
    {

        if (array_key_exists($key, $input)) {
            return $input[$key];
        }

        return null;
    }
}