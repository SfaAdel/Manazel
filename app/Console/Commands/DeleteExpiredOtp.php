<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Customer;
use Carbon\Carbon;

class DeleteExpiredOtp extends Command
{
    protected $signature = 'otp:cleanup';
    protected $description = 'Delete OTP records that are not verified within 31 minutes';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $now = Carbon::now();

        Customer::where('otp_till', '<', $now)
            ->whereNull('phone_verified_at')
            ->delete();

        $this->info('Expired OTP records deleted successfully.');
    }
}
