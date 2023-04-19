<?php

namespace App\Listeners;

use App\Models\User;
use App\Events\UserCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateUserXML
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\UserCreated  $event
     * @return void
     */
    public function handle(UserCreated $event)
    {
        $users = simplexml_load_file(public_path('../user.xml'));
        $user = $users->addChild('user');
        $user->addAttribute('id', $this->user->id);
        $user->addChild('name', $this->user->name);
        $user->addChild('email', $this->user->email);

        $users->asXML(public_path('../user.xml'));
    }
}
