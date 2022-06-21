<?php

namespace Subwayminder\Console\Commands;

use Subwayminder\Console\Args\Argument;
use Subwayminder\Console\Args\Parameter;
use Subwayminder\Console\Commands\Handler\DefaultHandler;
use Subwayminder\Console\Input\Input;
use Subwayminder\Console\Output\Output;

/**
 * Объект консольной команды
 * Class Command
 * @package Subwayminder\Console\Commands
 */
class Command
{
    private string $name;
    private string $description;
    private array $arguments;
    private array $params;
    private ICommandHandler $handler;

    /**
     * Command constructor.
     * @param string $name
     * @param string $description
     */
    public function __construct(string $name, string $description)
    {
        $this->name = $name;
        $this->description = $description;
        $this->handler = new DefaultHandler();
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @param string $description
     * @return $this
     */
    public function addArgument(string $name, string $description): Command
    {
        $this->arguments[$name] = new Argument($name, $description);
        return $this;
    }

    /**
     * @param string $name
     * @param string $description
     * @param bool $required
     * @return $this
     */
    public function addParam(string $name, string $description, bool $required = false): Command
    {
        $this->params[$name] = new Parameter($name, $description, $required);
        return $this;
    }

    /**
     * @return array
     */
    public function getArguments(): array
    {
        return $this->arguments;
    }

    /**
     * @return array
     */
    public function getParams(): array
    {
        return $this->params;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param ICommandHandler $handler
     * @return $this
     */
    public function addHandler(ICommandHandler $handler): Command
    {
        $this->handler = $handler;
        return $this;
    }

    /**
     * Передает обработку команды установленному обработчику
     * @param Input $input
     * @param Output $output
     */
    public function handle(Input $input, Output $output): void
    {
        $this->handler::handle($input, $output, $this);
    }
}