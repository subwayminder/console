<?php
namespace Subwayminder\Console\Args;
/**
 * Объект опции команды
 * Class Parameter
 * @package Subwayminder\Console\Args
 */
class Parameter
{
    private string $name;
    private string $description;
    private array $acceptedValues;
    private bool $required;

    /**
     * Parameter constructor.
     * @param string $name
     * @param string $description
     * @param string $required
     * @param array $acceptedValues
     */
    public function __construct(string $name, string $description, string $required, array $acceptedValues = [])
    {
        $this->name = $name;
        $this->description = $description;
        $this->acceptedValues = $acceptedValues;
        $this->required = $required;
    }

    /**
     * @return array
     */
    public function getAcceptedValues(): array
    {
        return $this->acceptedValues;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return bool|string
     */
    public function isRequired()
    {
        return $this->required;
    }
}