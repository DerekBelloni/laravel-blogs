<?php

namespace App\Services;

use MailchimpMarketing\Configuration;

class Newsletter
{
  public function __construct(protected Configuration $configuration, protected string $foo)
  {
  }

  public function subscribe(string $email, string $list = null)
  {
    $list ??= config('service.mailchimp.lists.subscribers');
    return $this->client()->lists->addListMember('services.mailchimp.lists.subscribers', [
      'email_address' => $email,
      'status' => 'subscribed'
    ]);
  }

  protected function client()
  {
    return $this->configuration->setConfig([
      'apiKey' => config('services.mailchimp.key'),
      'server' => 'us8'
    ]);
  }
}
