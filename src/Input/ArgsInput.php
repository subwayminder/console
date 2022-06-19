<?php

namespace Subwayminder\Console\Input;

class ArgsInput extends Input
{
    private array|null $tokens;

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

    protected function parse(): void
    {
        foreach ($this->tokens as $token) {
            if (str_starts_with($token, '{')) $this->addArgument($token);
            elseif (str_starts_with($token, '[')) $this->addParam($token);
            else $this->addArgument($token);
        }
    }

    private function addArgument(string $token): void
    {
        $this->formatString($token, '{}');
        $argumentsArr = explode(',', $token);
        foreach ($argumentsArr as $argument) {
            if ($argument) $this->arguments[] = $argument;
        }
    }

    private function addParam(string $token): void
    {
        $this->formatString($token, '[]');
        $paramsArr = explode('=', $token);
        $param = array_shift($paramsArr);
        $this->formatString($paramsArr[0], '{}');
        $valuesArr = explode(',', $paramsArr[0]);
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

    /**
     * Returns a stringified representation of the args passed to the command.
     *
     * @return string
     */
//    public function __toString(): string
//    {
//        $tokens = array_map(function ($token) {
//            if (preg_match('{^(-[^=]+=)(.+)}', $token, $match)) {
//                return $match[1] . $this->escapeToken($match[2]);
//            }
//
//            if ($token && '-' !== $token[0]) {
//                return $this->escapeToken($token);
//            }
//
//            return $token;
//        }, $this->tokens);
//
//        return implode(' ', $tokens);
//    }
}