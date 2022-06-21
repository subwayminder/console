<?php


namespace Subwayminder\Console\Commands;

use Subwayminder\Console\Input\Input;
use Subwayminder\Console\Output\Output;
use Subwayminder\Console\Commands\Command;

/**
 * Интерфейс для обработчиков консольных команд
 * Interface ICommandHandler
 * @package Subwayminder\Console\Commands
 */
interface ICommandHandler
{
    /**
     * @param Input $input
     * @param Output $output
     * @param \Subwayminder\Console\Commands\Command $command
     */
    public static function handle(Input $input, Output $output, Command $command): void;
}