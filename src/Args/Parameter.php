<?php
namespace Subwayminder\Console\Args;

class Parameter
{
    private string $name;
    private string $description;
    private array $acceptedValues;
    private bool $required;

    public function __construct(string $name, string $description, string $required, array $acceptedValues = [])
    {
        $this->name = $name;
        $this->description = $description;
        $this->acceptedValues = $acceptedValues;
        $this->required = $required;
    }

    public function getAcceptedValues(): array
    {
        return $this->acceptedValues;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function isRequired()
    {
        return $this->required;
    }
}