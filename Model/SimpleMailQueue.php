<?php

namespace Edge\MailQueueBundle\Model;

use Swift_Mailer;
use Swift_Message;

/**
 * Simple mail queue
 *
 * @author VeN <vaclav.novotny@edgedesign.cz>
 */
class SimpleMailQueue implements \Edge\MailQueueBundle\Model\MailQueue
{

    /**
     * @var \Swift_Mailer
     */
    private $mailer;

    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////

    public function __construct(Swift_Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////

    /**
     * Pushes mail into mail queue
     * @param \Swift_Message $mail E-mail message
     */
    public function push(Swift_Message $mail)
    {
        $this->mailer->send($mail);
    }

    /**
     * Pulls all e-mails from mail queue
     * @return null
     */
    public function pull()
    {
        return null;
    }

}
