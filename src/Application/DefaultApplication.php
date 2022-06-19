<?php
namespace Subwayminder\Console\Application;

use Subwayminder\Console\Commands\DefaultCommand;
use Subwayminder\Console\Input\ArgsInput;


class DefaultApplication
{
    private string $name;
    private array $commands;
    private ArgsInput $input;

    public function __construct(string $name)
    {
        $this->name = $name;
        $this->input = new ArgsInput();
    }

    public function addCommand(DefaultCommand $command): DefaultApplication
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
        $command = $this->commands[$this->input->getCommand()] ?: null;
        if($command) $command->handle();
        else echo 'Команды не существует';
    }
}