<?php

namespace Edge\MailQueueBundle\Test\Model;

use Edge\MailQueueBundle\Model\SimpleMailQueue;

/**
 * @author VeN <vaclav.novotny@edgedesign.cz>
 */
class SimpleMailQueueTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var \Edge\MailQueueBundle\Model\SimpleMailQueue
     */
    private $simpleMailQueue;

    /**
     * @var \Swift_Mailer
     */
    private $swiftMailer;

    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////

    protected function setUp()
    {
        $this->swiftMailer = $this->getMockBuilder('\Swift_Mailer')
            ->disableOriginalConstructor()
            ->setMethods(array('send'))
            ->getMock();

        $this->simpleMailQueue = new SimpleMailQueue($this->swiftMailer);
    }

    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////

    public function testInstanceOfMailQueue()
    {
        $this->assertInstanceOf('\Edge\MailQueueBundle\Model\MailQueue', $this->simpleMailQueue);
    }

    public function testPush()
    {
        $mailMessage = $this->getMockBuilder('\Swift_Message')
            ->disableOriginalConstructor()
            ->getMock();

        $this->swiftMailer->expects($this->once())
            ->method('send')
            ->with($this->equalTo($mailMessage));

        $this->assertNull($this->simpleMailQueue->push($mailMessage));
    }

}
