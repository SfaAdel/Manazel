<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ProviderAvailabilityUpdated
{
    use Dispatchable, SerializesModels;

    public $providerId;
    public $availability;

    /**
     * Create a new event instance.
     *
     * @param int $providerId
     * @param bool $availability
     */
    public function __construct(int $providerId, bool $availability)
    {
        $this->providerId = $providerId;
        $this->availability = $availability;
    }
}
