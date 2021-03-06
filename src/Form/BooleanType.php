<?php
/**
 * Created by rest-bundle.
 * User: ssp
 * Date: 16.09.16
 * Time: 15:34.
 */
namespace NorseDigital\Symfony\RestBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;

class BooleanType extends ChoiceType
{
    const DEFAULT_OPTIONS = [
        'choices' => [false, true],
        'choices_as_values' => true,
        'required' => false,
    ];

    public function buildForm(FormBuilderInterface $builder, array $options = self::DEFAULT_OPTIONS)
    {
        parent::buildForm($builder, $options);
    }
}
