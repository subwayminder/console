<?php


namespace Subwayminder\Console\Commands;

use Subwayminder\Console\Input\Input;
use Subwayminder\Console\Output\Output;
use Subwayminder\Console\Commands\Command;

interface ICommandHandler
{
    public static function handle(Input $input, Output $output, Command $command): void;
}