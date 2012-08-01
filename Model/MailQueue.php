<?php

namespace Edge\MailQueueBundle\Model;

use Swift_Message;

/**
 * Mail queue interface
 *
 * @author VeN <vaclav.novotny@edgedesign.cz>
 */
interface MailQueue
{
    public function push(Swift_Message $mail);
    public function pull();
}
