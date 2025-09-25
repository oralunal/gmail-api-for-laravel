<?php

namespace OralUnal\GmailApi\ServiceProvider;

use Google\Client;
use Google\Service\Gmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\ServiceProvider;
use OralUnal\GmailApi\Exceptions\CredentialsJsonFullPathDoesntExist;
use OralUnal\GmailApi\Transport\GmailApiTransport;

class GmailApiServiceProvider  extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../../config/gmail-api.php', 'gmail-api'
        );
    }

    public function boot(): void
    {
        Mail::extend('gmail-api', function () {
            $full_path = config('gmail-api.credentials_json_full_path');
            if(! $full_path || ! file_exists($full_path))
                throw new CredentialsJsonFullPathDoesntExist('Please set the full path to your credentials.json file in the gmail-api.credentials_json_full_path config key.');

            putenv('GOOGLE_APPLICATION_CREDENTIALS='.config('gmail-api.credentials_json_full_path'));
            $client = new Client();
            $client->useApplicationDefaultCredentials();
            $client->addScope(Gmail::MAIL_GOOGLE_COM);
            $client->setSubject(config('mail.from.address'));

            $gmail = new Gmail($client);
            return new GmailApiTransport($gmail);
        });

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../../config/gmail-api.php' => config_path('gmail-api.php'),
            ], 'config');
        }
    }
}
