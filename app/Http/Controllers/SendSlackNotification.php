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

    public function sendInternshipNotification($internship)
    {
        $message = "🎉 *New Internship Application Submitted!* 🎉";
        $attachments = [
            [
                'color' => '#36a64f',
                'title' => 'Internship Application Details',
                'fields' => [
                    [
                        'title' => 'Name',
                        'value' => $internship->user->name,
                        'short' => true
                    ],
                    [
                        'title' => 'School',
                        'value' => $internship->user->school,
                        'short' => true
                    ],
                    [
                        'title' => 'Phone',
                        'value' => $internship->user->phone,
                        'short' => true
                    ],
                    [
                        'title' => 'Level',
                        'value' => $internship->user->level,
                        'short' => true
                    ],
                    [
                        'title' => 'Specialty',
                        'value' => $internship->specialty->name,
                        'short' => true
                    ],
                    [
                        'title' => 'Status',
                        'value' => $internship->status,
                        'short' => true
                    ],
                    [
                        'title' => 'Start Date',
                        'value' => date('F j, Y', strtotime($internship->start_date)),
                        'short' => true
                    ],
                    [
                        'title' => 'End Date',
                        'value' => date('F j, Y', strtotime($internship->end_date)),
                        'short' => true
                    ],
                ],
                'footer' => 'Internship Application System',
                'ts' => time()
            ]
        ];

        if ($internship->resume) {
            $attachments[0]['fields'][] = [
                'title' => 'Resume',
                'value' => 'Attached',
                'short' => true
            ];
        }

        return $this->sendNotification($message, $attachments);
    }
}
