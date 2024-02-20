<?php

namespace App\Http\Controllers\Commands;

use App\Http\Controllers\BotController;
use GuzzleHttp\Client;
use Telegram\Bot\Api;
use Telegram\Bot\Commands\Command;
use Telegram\Bot\Commands\CommandInterface;
use Telegram\Bot\FileUpload\InputFile;
use Telegram\Bot\Objects\Update;

class GetApkCommand extends Command
{

    protected  $name = 'getApk';
    protected  $description = 'Получить последнюю версию на Android';

    public function handle()
    {
        $client = new Client();
        $resp = $client->request(
            'GET',
            'https://api.github.com/repos/danilkochura/imdibil-kt/releases/latest',
            [
                'headers' =>
                    [
                        "User-Agent: DanilKochura-Imdibil-kt"
                    ]
            ]

        );
        $result = json_decode($resp->getBody(), true);

        $file = InputFile::create($result['assets'][0]['browser_download_url'], $result['assets'][0]['name']);
        $this->replyWithDocument([
            'document' => $file, 'caption' => $result['name']
        ]);
        $this->replyWithMessage(
            [
                'text' => "Подробнее на GitHub: ".PHP_EOL.$result['html_url']
            ]
        );

    }

}
