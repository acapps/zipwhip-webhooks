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

namespace acapps\models;

use acapps\converters\DateConverters;
use acapps\converters\JsonToMessage;


/**
 * Class Message
 * @package acapps\models
 */
class Message extends Model implements \JsonSerializable
{
    use JsonToMessage {
        parseMessage as protected;
    }
    use DateConverters {
        dateToString as protected; stringToDate as protected;
    }

    /**
     * @var string
     */
    private $id = '';
    /**
     * @var string
     */
    private $deviceId = '';
    /**
     * @var string
     */
    private $fingerprint = '';
    /**
     * @var string
     */
    private $contactId = '';
    /**
     * @var string
     */
    private $finalDestination = '';
    /**
     * @var string
     */
    private $finalSource = '';
    /**
     * @var string
     */
    private $address = '';
    /**
     * @var string
     */
    private $bcc = '';
    /**
     * @var string
     */
    private $cc = '';
    /**
     * @var string
     */
    private $messageType = '';
    /**
     * @var string
     */
    private $body = '';
    /**
     * @var int
     */
    private $bodySize = 0;
    /**
     * @var int
     */
    private $statusCode = 0;
    /**
     * @var bool
     */
    private $hasAttachment = false;
    /**
     * @var bool
     */
    private $deleted = false;
    /**
     * @var bool
     */
    private $read = false;
    /**
     * @var bool
     */
    private $visible = true;
    /**
     * @var \DateTime null
     */
    private $dateCreated = null;
    /**
     * @var \DateTime null
     */
    private $dateDeleted = null;
    /**
     * @var \DateTime null
     */
    private $dateRead = null;
    /**
     * @var \DateTime null
     */
    private $scheduledDate = null;

    /**
     * @param $json
     * @return Message
     */
    public function parseMessageJson($json)
    {
        return $this->parseMessage($json, $this);
    }

    function jsonSerialize()
    {
        return array(
            'id' => $this->getId(),
            'deviceId' => $this->getDeviceId(),
            'fingerprint' => $this->getFingerprint(),
            'contactId' => $this->getContactId(),
            'finalDestination' => $this->getFinalDestination(),
            'finalSource' => $this->getFinalSource(),
            'address' => $this->getAddress(),
            'bcc' => $this->getBcc(),
            'cc' => $this->getCc(),
            'messageType' => $this->getMessageType(),
            'body' => $this->getBody(),
            'bodySize' => $this->getBodySize(),
            'statusCode' => $this->getStatusCode(),
            'hasAttachment' => $this->getHasAttachment(),
            'deleted' => $this->getDeleted(),
            'read' => $this->getRead(),
            'visible' => $this->getVisible(),
            'dateCreated' => $this->getDateCreatedAsString(),
            'dateDeleted' => $this->getDateDeletedAsString(),
            'dateRead' => $this->getDateReadAsString(),
            'scheduledDate' => $this->getScheduledDateAsString(),
        );
    }


    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = (string)$id;
    }

    /**
     * @return string
     */
    public function getDeviceId()
    {
        return $this->deviceId;
    }

    /**
     * @param string $deviceId
     */
    public function setDeviceId($deviceId)
    {
        $this->deviceId = (string)$deviceId;
    }

    /**
     * @return string
     */
    public function getFingerprint()
    {
        return $this->fingerprint;
    }

    /**
     * @param string $fingerprint
     */
    public function setFingerprint($fingerprint)
    {
        $this->fingerprint = (string)$fingerprint;
    }

    /**
     * @return string
     */
    public function getContactId()
    {
        return $this->contactId;
    }

    /**
     * @param string $contactId
     */
    public function setContactId($contactId)
    {
        $this->contactId = (string)$contactId;
    }

    /**
     * @return string
     */
    public function getFinalDestination()
    {
        return $this->finalDestination;
    }

    /**
     * @param string $finalDestination
     */
    public function setFinalDestination($finalDestination)
    {
        $this->finalDestination = (string)$finalDestination;
    }

    /**
     * @return string
     */
    public function getFinalSource()
    {
        return $this->finalSource;
    }

    /**
     * @param string $finalSource
     */
    public function setFinalSource($finalSource)
    {
        $this->finalSource = (string)$finalSource;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getBcc()
    {
        return $this->bcc;
    }

    /**
     * @param string $bcc
     */
    public function setBcc($bcc)
    {
        $this->bcc = (string)$bcc;
    }

    /**
     * @return string
     */
    public function getCc()
    {
        return $this->cc;
    }

    /**
     * @param string $cc
     */
    public function setCc($cc)
    {
        $this->cc = (string)$cc;
    }

    /**
     * @return string
     */
    public function getMessageType()
    {
        return $this->messageType;
    }

    /**
     * @param string $messageType
     */
    public function setMessageType($messageType)
    {
        $this->messageType = $messageType;
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param string $body
     */
    public function setBody($body)
    {
        $this->body = (string)$body;
    }

    /**
     * @return int
     */
    public function getBodySize()
    {
        return $this->bodySize;
    }

    /**
     * @param int $bodySize
     */
    public function setBodySize($bodySize)
    {
        $this->bodySize = $bodySize;
    }

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @param int $statusCode
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
    }

    /**
     * @return boolean
     */
    public function getHasAttachment()
    {
        return $this->hasAttachment;
    }

    /**
     * @param boolean $hasAttachment
     */
    public function setHasAttachment($hasAttachment)
    {
        $this->hasAttachment = $hasAttachment;
    }

    /**
     * @return boolean
     */
    public function getDeleted()
    {
        return $this->deleted;
    }

    /**
     * @param boolean $deleted
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;
    }

    /**
     * @return boolean
     */
    public function getRead()
    {
        return $this->read;
    }

    /**
     * @param boolean $read
     */
    public function setRead($read)
    {
        $this->read = $read;
    }

    /**
     * @return boolean
     */
    public function getVisible()
    {
        return $this->visible;
    }

    /**
     * @param boolean $visible
     */
    public function setVisible($visible)
    {
        $this->visible = $visible;
    }

    /**
     * @return \DateTime
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * @return string
     */
    public function getDateCreatedAsString()
    {
        return $this->dateToString($this->dateCreated);
    }

    /**
     * @param \DateTime $dateCreated
     */
    public function setDateCreated(\DateTime $dateCreated)
    {
        $this->dateCreated = $dateCreated;
    }

    /**
     * @param string $dateCreated
     */
    public function setDateCreatedFromString($dateCreated = '')
    {
        if (empty($dateCreated)) {
            return;
        }
        $this->dateCreated = new \DateTime($dateCreated);
    }

    /**
     * @return \DateTime
     */
    public function getDateDeleted()
    {
        return $this->dateDeleted;
    }

    /**
     * @return string
     */
    public function getDateDeletedAsString()
    {
        return $this->dateToString($this->dateDeleted);
    }

    /**
     * @param \DateTime $dateDeleted
     */
    public function setDateDeleted(\DateTime $dateDeleted)
    {
        $this->dateDeleted = $dateDeleted;
    }

    /**
     * @param string $dateDeleted
     */
    public function setDateDeletedFromString($dateDeleted = '')
    {
        if (empty($dateDeleted)) {
            return;
        }
        $this->dateDeleted = new \DateTime($dateDeleted);
    }

    /**
     * @return \DateTime
     */
    public function getDateRead()
    {
        return $this->dateRead;
    }

    /**
     * @return string
     */
    public function getDateReadAsString()
    {
        return $this->dateToString($this->dateRead);
    }

    /**
     * @param \DateTime $dateRead
     */
    public function setDateRead(\DateTime $dateRead)
    {
        $this->dateRead = $dateRead;
    }

    /**
     * @param string $dateRead
     */
    public function setDateReadFromString($dateRead = '')
    {
        if (empty($dateDeleted)) {
            return;
        }
        $this->dateRead = new \DateTime($dateRead);
    }

    /**
     * @return \DateTime
     */
    public function getScheduledDate()
    {
        return $this->scheduledDate;
    }

    /**
     * @return string
     */
    public function getScheduledDateAsString()
    {
        return $this->dateToString($this->scheduledDate);
    }

    /**
     * @param \DateTime $scheduledDate
     */
    public function setScheduledDate(\DateTime $scheduledDate)
    {
        $this->scheduledDate = $scheduledDate;
    }

    /**
     * @param string $scheduledDate
     */
    public function setScheduledDateFromString($scheduledDate = '')
    {
        if (empty($scheduledDate)) {
            return;
        }
        $this->scheduledDate = new \DateTime($scheduledDate);
    }
}
