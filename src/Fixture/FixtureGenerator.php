<?php
/**
 * Created by rest-bundle.
 * User: ssp
 * Date: 09.09.16
 * Time: 11:44.
 */
namespace NorseDigital\Symfony\RestBundle\Fixture;

use NorseDigital\Symfony\RestBundle\Exception\Fixture\FixtureGeneratorException;
use NorseDigital\Symfony\RestBundle\Fixture\FixtureGenerator\FixtureGeneratorRule;
use NorseDigital\Symfony\RestBundle\Fixture\FixtureGenerator\FixtureGeneratorStrategy;

class FixtureGenerator
{
    /**
     * @param FixtureGeneratorRule $rule
     *
     * @return string json string
     *
     * @throws FixtureGeneratorException
     */
    public function generate(FixtureGeneratorRule $rule): string
    {
        return json_encode($this->generateArrayForRule($rule), JSON_PRETTY_PRINT);
    }

    /**
     * @param FixtureGeneratorRule $rule
     *
     * @return array|string
     */
    private function generateArrayForRule(FixtureGeneratorRule $rule)
    {
        if (!empty($rule->getRules())) {
            return $this->generateSubRules($rule);
        }

        $chunks = [];

        for ($i = 0; $i < $rule->getCount(); ++$i) {
            $chunks[] = $this->generateChunk($rule);
        }

        return implode($rule->getDelimiter(), $chunks);
    }

    /**
     * @param FixtureGeneratorRule $rule
     *
     * @return int|string
     */
    private function generateChunk(FixtureGeneratorRule $rule)
    {
        switch ($rule->getStrategy()) {
            case FixtureGeneratorStrategy::PREFIX_WITH_NUMBER:
                $value = $rule->getPrefix().'-'.$rule->getNumber();

                $rule->setNumber($rule->getNumber() + 1);

                return $value;
            case FixtureGeneratorStrategy::REFERENCE:
                return $rule->getReferenceArray()[mt_rand(0, count($rule->getReferenceArray()) - 1)]['referenceName'];
            default:
                return mt_rand(1, 1000);
        }
    }

    /**
     * @param FixtureGeneratorRule $rule
     *
     * @return array
     */
    private function generateSubRules(FixtureGeneratorRule $rule)
    {
        $subRuleArray = [];

        for ($i = 0; $i < $rule->getCountRepeat(); ++$i) {
            foreach ($rule->getRules() as $subRule) {
                empty($subRule->getKey()) ? $subRuleArray[$i] = $this->generateArrayForRule($subRule) :
                                            $subRuleArray[$i][$subRule->getKey()] = $this->generateArrayForRule($subRule);
            }
        }

        return $subRuleArray;
    }

    /**
     * @param string               $fileName
     * @param FixtureGeneratorRule $rule
     */
    public function save(string $fileName, FixtureGeneratorRule $rule)
    {
        file_put_contents($fileName, $this->generate($rule));
    }
}
