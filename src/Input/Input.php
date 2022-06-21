<?php


namespace Subwayminder\Console\Input;


abstract class Input
{
    protected string $scriptName;
    protected array $params;
    protected array $arguments;
    protected string $command;

    protected array|null $tokens;

    /**
     * Input constructor.
     * @param array|null $argv
     */
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

    /**
     * Парсинг входящих аргументов
     */
    abstract protected function parse(): void;

    /**
     * @return string
     */
    public function getCommand(): string
    {
        return $this->command;
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
     * Добавляет аргумент в инпут
     * @param string $token
     */
    protected function addArgument(string $token): void
    {
        $this->formatString($token, '{}');
        $argumentsArr = explode(',', $token);
        foreach ($argumentsArr as $argument) {
            if ($argument) $this->arguments[$argument] = $argument;
        }
    }

    /**
     * Добавляет опцию в инпут
     * @param string $token
     */
    protected function addParam(string $token): void
    {
        $this->formatString($token, '[]');
        $paramsArr = explode('=', $token);
        $param = array_shift($paramsArr);
        $this->formatString($paramsArr[0], '{}');
        $valuesArr = explode(',', trim($paramsArr[0]));
        $this->addValuesToParam($param, $valuesArr);
    }

    /**
     * @param string $param
     * @param array $values
     */
    private function addValuesToParam(string $param, array $values): void
    {
        foreach ($values as $value) {
            $this->params[$param][] = $value;
        }
    }

    /**
     * @param string $item
     * @param string $pattern
     */
    private function formatString(string &$item, string $pattern): void
    {
        $item = trim(trim($item), $pattern);
    }
}