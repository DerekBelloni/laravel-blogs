<?php

namespace App\Services;

use MailchimpMarketing\Configuration;

class MailchimpNewsletter implements Newsletter
{
  public function __construct(protected Configuration $configuration)
  {
  }

  public function subscribe(string $email, string $list = null)
  {
    $list ??= config('service.mailchimp.lists.subscribers');
    return $this->configuration->lists->addListMember($list, [
      'email_address' => $email,
      'status' => 'subscribed'
    ]);
  }
}
