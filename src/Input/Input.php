<?php


namespace Subwayminder\Console\Input;


abstract class Input
{
    protected string $scriptName;
    protected array $params;
    protected array $arguments;
    protected string $command;

    abstract protected function parse(): void;

    public function getCommand(): string
    {
        return $this->command;
    }

    public function getArguments(): array
    {
        return $this->arguments;
    }

    public function getParams(): array
    {
        return $this->params;
    }
}