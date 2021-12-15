<?php

namespace App\Listeners;

use App\Events\Register\RegisteredBusinessUser;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Repository\ShipperRepository;

class CreateShipperForBusinessUser
{
    private ShipperRepository $shippers;

    /**
     * Create the event listener.
     *
     * @param ShipperRepository $shipperRepository
     */
    public function __construct(ShipperRepository $shipperRepository)
    {
        $this->shippers = $shipperRepository;
    }

    /**
     * Handle the event.
     *
     * @param  RegisteredBusinessUser  $event
     * @return void
     */
    public function handle(RegisteredBusinessUser $event)
    {
        $this->shippers->createForUser(
            $event->user,
            $event->businessName
        );
    }
}
