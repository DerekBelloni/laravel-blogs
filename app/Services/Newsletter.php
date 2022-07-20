<?php

namespace App\Services;

use MailchimpMarketing\Configuration;

class Newsletter
{
  public function subscribe($email)
  {
    $mailchimp = new Configuration();

    $mailchimp->setConfig([
      'apiKey' => config('services.mailchimp.key'),
      'server' => 'us8'
    ]);

    return $mailchimp->lists->addListMember('d972bfda3a', [
      'email_address' => $email,
      'status' => 'subscribed'
    ]);
  }
}
