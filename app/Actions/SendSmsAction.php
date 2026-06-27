<?php

namespace App\Actions;

use App\Models\User;
use Aws\Sns\SnsClient;
use App\Models\Setting;
use App\Models\SmsHistory;

class SendSmsAction
{
    public function __invoke(string $mobile, string $message, ?User $user = null)
    {
        if (Setting::valueOf(Setting::SKIP_SMS) == true) {
            return;
        }

        $sns = new SnsClient([
            'region'      => env('AWS_SNS_REGION'),
            'version'     => 'latest',
            'credentials' => [
                'key'    => env('AWS_SNS_ACCESS_KEY'),
                'secret' => env('AWS_SNS_SECRET_ACCESS_KEY'),
            ],
        ]);

        $response = $sns->publish([
            'Message'     => $message,
            'PhoneNumber' => $mobile,
        ]);

        SmsHistory::query()->create([
            'mobile'  => $mobile,
            'message' => $message,
            'status'  => $response['@metadata']['statusCode'],
            'user_id' => $user?->id,
        ]);
    }
}
