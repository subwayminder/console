<?php


namespace Subwayminder\Console\Commands\Handler;


use Subwayminder\Console\Commands\ICommandHandler;
use Subwayminder\Console\Input\Input;
use Subwayminder\Console\Output\Output;
use Subwayminder\Console\Commands\Command;

/**
 * Стандартный обработчик команд, добавляется в экземпляр команды по умолчанию
 * Class DefaultHandler
 * @package Subwayminder\Console\Commands\Handler
 */
class DefaultHandler implements ICommandHandler
{
    public static function handle(Input $input, Output $output, Command $command): void
    {
        echo PHP_EOL.'Handler for this command is not set'.PHP_EOL;
    }
}