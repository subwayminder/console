<?php
namespace Subwayminder\Console\Commands;

use Subwayminder\Console\Input\Input;
use Subwayminder\Console\Application\DefaultApplication;
use Cassandra\Collection;
use Subwayminder\Console\Commands\ICommandHandler;

class DefaultCommand
{
    private string $name;
    private string $description;
    private array $arguments;
    private array $params;
    private ICommandHandler $handler;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function addArgument()
    {
        $this->arguments[] = 'test';
        return $this;
    }

    public function addParam()
    {
        $this->params[] = 'lox';
        return $this;
    }

    public function addHandler(ICommandHandler $handler)
    {
        $this->handler = $handler;
        return $this;
    }

    public function handle(): void
    {
        $this->handler->handle();
    }
}