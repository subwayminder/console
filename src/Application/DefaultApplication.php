<?php
namespace Subwayminder\Console\Application;

use Subwayminder\Console\Commands\Command;
use Subwayminder\Console\Input\Input;
use Subwayminder\Console\Output\Output;


class DefaultApplication
{
    private string $name;
    private array $commands;
    private Input $input;
    private Output $output;

    public function __construct(string $name, Input $input, Output $output)
    {
        $this->name = $name;
        $this->input = $input;
        $this->output = $output;
    }

    public function addCommand(Command $command): DefaultApplication
    {
        $this->commands[$command->getName()] = $command;
        return $this;
    }

    public function getCommand(string $name)
    {
        return $this->commands[$name];
    }

    public function run(): void
    {
        if(array_key_exists($this->input->getCommand(), $this->commands)) $this->commands[$this->input->getCommand()]->handle($this->input, $this->output);
        else echo PHP_EOL.'Такой команды не существует'.PHP_EOL;
    }
}