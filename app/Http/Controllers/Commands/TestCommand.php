<?php

namespace App\Http\Controllers\Commands;

use App\Http\Controllers\BotController;
use Telegram\Bot\Api;
use Telegram\Bot\Commands\Command;
use Telegram\Bot\Commands\CommandInterface;
use Telegram\Bot\Objects\Update;

class TestCommand extends Command
{

    protected  $name = 'test';
    protected  $description = 'Test command for bot';

    public function handle()
    {
        $this->replyWithMessage([
            'text' => 'Hey, there! This is test cmsd!',
        ]);
    }

}
