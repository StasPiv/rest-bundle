<?php
/**
 * Created by rest-bundle.
 * User: ssp
 * Date: 09.09.16
 * Time: 11:47.
 */
namespace NorseDigital\Symfony\RestBundle\Fixture\FixtureGenerator;

class FixtureGeneratorRule
{
    /**
     * @var array|FixtureGeneratorRule[]
     */
    private $rules = [];

    /**
     * @var string
     */
    private $key = '';

    /**
     * @var string
     */
    private $strategy = FixtureGeneratorStrategy::WORD;

    /**
     * @var int
     */
    private $count = 1;

    /**
     * @var int
     */
    private $countRepeat = 1;

    /**
     * @var string
     */
    private $delimiter = '';

    /**
     * @var string
     */
    private $prefix = '';

    /**
     * @var array
     */
    private $referenceArray = [];

    /**
     * @var int
     */
    private $number = 1;

    /**
     * @return array|FixtureGeneratorRule[]
     */
    public function getRules()
    {
        return $this->rules;
    }

    /**
     * @param array|FixtureGeneratorRule[] $rules
     *
     * @return FixtureGeneratorRule
     */
    public function setRules($rules)
    {
        $this->rules = $rules;

        return $this;
    }

    /**
     * @param FixtureGeneratorRule $rule
     *
     * @return FixtureGeneratorRule
     */
    public function addRule(FixtureGeneratorRule $rule)
    {
        $this->rules[] = $rule;

        return $this;
    }

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @param string $key
     *
     * @return FixtureGeneratorRule
     */
    public function setKey(string $key): self
    {
        $this->key = $key;

        return $this;
    }

    /**
     * @return string
     */
    public function getStrategy(): string
    {
        return $this->strategy;
    }

    /**
     * @param string $strategy
     *
     * @return FixtureGeneratorRule
     */
    public function setStrategy(string $strategy): self
    {
        $this->strategy = $strategy;

        return $this;
    }

    /**
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
    }

    /**
     * @param int $count
     *
     * @return FixtureGeneratorRule
     */
    public function setCount(int $count): self
    {
        $this->count = $count;

        return $this;
    }

    /**
     * @return int
     */
    public function getCountRepeat(): int
    {
        return $this->countRepeat;
    }

    /**
     * @param int $countRepeat
     *
     * @return FixtureGeneratorRule
     */
    public function setCountRepeat(int $countRepeat): self
    {
        $this->countRepeat = $countRepeat;

        return $this;
    }

    /**
     * @return string
     */
    public function getDelimiter(): string
    {
        return $this->delimiter;
    }

    /**
     * @param string $delimiter
     *
     * @return FixtureGeneratorRule
     */
    public function setDelimiter(string $delimiter): self
    {
        $this->delimiter = $delimiter;

        return $this;
    }

    /**
     * @return string
     */
    public function getPrefix(): string
    {
        return $this->prefix;
    }

    /**
     * @param string $prefix
     *
     * @return FixtureGeneratorRule
     */
    public function setPrefix(string $prefix): self
    {
        $this->prefix = $prefix;

        return $this;
    }

    /**
     * @return array
     */
    public function getReferenceArray(): array
    {
        return $this->referenceArray;
    }

    /**
     * @param array $referenceArray
     *
     * @return FixtureGeneratorRule
     */
    public function setReferenceArray(array $referenceArray): self
    {
        $this->referenceArray = $referenceArray;

        return $this;
    }

    /**
     * @param string $reference
     *
     * @return FixtureGeneratorRule
     *
     * @internal param string $value
     */
    public function addReference(string $reference): self
    {
        $this->referenceArray[] = $reference;

        return $this;
    }

    /**
     * @return int
     */
    public function getNumber(): int
    {
        return $this->number;
    }

    /**
     * @param int $number
     *
     * @return FixtureGeneratorRule
     */
    public function setNumber(int $number): self
    {
        $this->number = $number;

        return $this;
    }
}
