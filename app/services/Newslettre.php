<?php

namespace App\Services;


class newslettre
{
    public function subscribe(string $email)
    {
     
        $mailchimp = new \MailchimpMarketing\ApiClient();

        $mailchimp->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us5'
        ]);

        return $response = $mailchimp->lists->addListMember('981a61d9ed', [
            'email_address' => $email,
            'status' => 'subscribed'
    }
}
