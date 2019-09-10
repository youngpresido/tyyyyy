<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    public function __construct()
    {
        Event::listen('fingerprints.register', function($data)
{
    // Do some stuff before informing URL to user

    // inform SDK to open this URL
    echo url('test?message=' . $data['message']);
});


Event::listen('fingerprints.verify', function($data){
    $action = $data['extras']['action'];
    switch ($action) {
        case 'login':
            // Log user to database here, i.e: Adding new session etc.
            // Example: 
            // Session::add($data['user']->id);

            // Then tell SDK to open this page
            echo action('testController@index', array('message' => $data['message']));
            break;
        
        case 'transactions.confirm':
            // mark transaction as verified, example usage:

            // $transaction = Transaction::find($data['extras']['transaction_id']);
            // $transaction->verified = true;
            // $transaction->save();

            // Then tell SDK to open this page
            echo route('transactions', 
                array(
                    'message' => $data['message'], 
                    'id' => $data['extras']['transaction_id'])
                );
            break;
    }
});
    }
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

    
    }
}
