<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;

class BotManController extends Controller
{
    public function handle()
    {
        $botman = app('botman');
        $faqs = config('faqs');

        $botman->hears('{message}', function (BotMan $bot, $message) use ($faqs) {
            $bestMatch = null;
            $highestSimilarity = 0;
            $threshold = 40; // Similarity threshold percentage

            foreach ($faqs as $question => $answer) {
                similar_text(strtolower($message), strtolower($question), $similarity);
                if ($similarity > $highestSimilarity) {
                    $highestSimilarity = $similarity;
                    $bestMatch = $answer;
                }
            }

            if ($highestSimilarity >= $threshold) {
                $bot->reply($bestMatch);
            } else {
                $bot->reply('I\'m sorry, I couldn\'t find an answer to your question. Please try rephrasing or ask something else.');
            }
        });

        $botman->hears('help', function (BotMan $bot) {
            $question = Question::create('How can I help you?')
                ->fallback('Unable to ask question')
                ->callbackId('ask_reason')
                ->addButtons([
                    Button::create('Application Process')->value('application_process'),
                    Button::create('Internship Details')->value('internship_details'),
                ]);

            $bot->ask($question, function (Answer $answer, BotMan $bot) {
                if ($answer->isInteractiveMessageReply()) {
                    $value = $answer->getValue();
                    if ($value === 'application_process') {
                        $bot->reply('You can apply for an internship by visiting our application page...');
                    } elseif ($value === 'internship_details') {
                        $bot->reply('Our internships range from 1 to 6 months...');
                    }
                }
            });
        });

        $botman->listen();
    }
}
