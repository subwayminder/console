<?php
namespace Subwayminder\Console\Commands;

use Subwayminder\Console\Args\Argument;
use Subwayminder\Console\Args\Parameter;
use Subwayminder\Console\Commands\Handler\DefaultHandler;
use Subwayminder\Console\Input\Input;
use Subwayminder\Console\Output\Output;

class Command
{
    private string $name;
    private string $description;
    private array $arguments;
    private array $params;
    private ICommandHandler $handler;

    public function __construct(string $name, string $description)
    {
        $this->name = $name;
        $this->description = $description;
        $this->handler = new DefaultHandler();
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function addArgument(string $name, string $description): Command
    {
        $this->arguments[] = new Argument('', '', );
        return $this;
    }

    public function addParam(string $name, string $description, bool $required = false): Command
    {
        $this->params[] = new Parameter($name, $description, $required);
        return $this;
    }

    public function addHandler(ICommandHandler $handler): Command
    {
        $this->handler = $handler;
        return $this;
    }

    public function handle(Input $input, Output $output): void
    {
        $this->handler::handle($input, $output, $this);
    }
}