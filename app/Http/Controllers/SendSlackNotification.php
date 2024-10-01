<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SendSlackNotification extends Controller
{
    private static string $webhookUrl;
    private static string $username = 'PM-Notify';
    private static string $channel = '#announcements';

    public function __construct()
    {
        self::$webhookUrl = env('SLACK_WEBHOOK');
    }

    public function sendNotification($message, $attachments = [])
    {
        $data = [
            'text' => $message,
            'channel' => self::$channel,
            'username' => self::$username,
            'mrkdwn' => true,
            'attachments' => $attachments,
        ];

        $jsonPayload = json_encode($data);

        $ch = curl_init(self::$webhookUrl);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonPayload);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Content-Length: ' . strlen($jsonPayload),
        ]);

        $response = curl_exec($ch);

        if ($response === false) {
            return 'error';
        }

        curl_close($ch);

        return 'success';
    }
}
