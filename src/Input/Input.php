<?php


namespace Subwayminder\Console\Input;


abstract class Input
{
    protected string $scriptName;
    protected array $params;
    protected array $arguments;
    protected string $command;

    protected array|null $tokens;

    public function __construct(array $argv = null)
    {
        if (null === $argv) {
            $argv = $_SERVER['argv'];
        }

        $this->scriptName = array_shift($argv);
        $this->command = $argv[0];
        $this->tokens = array_slice($argv, 1);
        $this->arguments = [];
        $this->params = [];
        $this->parse();
    }

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

    protected function addArgument(string $token): void
    {
        $this->formatString($token, '{}');
        $argumentsArr = explode(',', $token);
        foreach ($argumentsArr as $argument) {
            if ($argument) $this->arguments[] = $argument;
        }
    }

    protected function addParam(string $token): void
    {
        $this->formatString($token, '[]');
        $paramsArr = explode('=', $token);
        $param = array_shift($paramsArr);
        $this->formatString($paramsArr[0], '{}');
        $valuesArr = explode(',', trim($paramsArr[0]));
        $this->addValuesToParam($param, $valuesArr);
    }

    private function addValuesToParam(string $param, array $values): void
    {
        foreach ($values as $value) {
            $this->params[$param][] = $value;
        }
    }

    private function formatString(string &$item, string $pattern): void
    {
        $item = trim(trim($item), $pattern);
    }
}