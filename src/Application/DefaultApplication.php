<?php
namespace Subwayminder\Console\Application;

use Subwayminder\Console\Commands\Command;
use Subwayminder\Console\Input\Input;
use Subwayminder\Console\Output\Output;

/**
 * Объект консольного приложения
 * Class DefaultApplication
 * @package Subwayminder\Console\Application
 */
class DefaultApplication
{
    private string $name;
    private array $commands;
    private Input $input;
    private Output $output;

    /**
     * DefaultApplication constructor.
     * @param string $name
     * @param Input $input
     * @param Output $output
     */
    public function __construct(string $name, Input $input, Output $output)
    {
        $this->name = $name;
        $this->input = $input;
        $this->output = $output;
    }

    /**
     * @param Command $command
     * @return $this
     */
    public function addCommand(Command $command): DefaultApplication
    {
        $this->commands[$command->getName()] = $command;
        return $this;
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function getCommand(string $name)
    {
        return $this->commands[$name];
    }

    /**
     * Старт приложения
     */
    public function run(): void
    {
        if(array_key_exists($this->input->getCommand(), $this->commands)){
            if (array_key_exists('help', $this->input->getArguments())){
                $this->output->writeLn(0, $this->commands[$this->input->getCommand()]->getDescription());
            }
            else{
                $this->commands[$this->input->getCommand()]->handle($this->input, $this->output);
            }
        }
        else echo PHP_EOL.'Такой команды не существует'.PHP_EOL;
    }
}