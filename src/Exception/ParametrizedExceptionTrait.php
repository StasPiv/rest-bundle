<?php
/**
 * Created by cvident-backend-api.
 * User: ssp
 * Date: 02.12.16
 * Time: 16:19.
 */
namespace NorseDigital\Symfony\RestBundle\Exception;

trait ParametrizedExceptionTrait
{
    /**
     * @var array
     */
    protected $parameters;

    /**
     * @return array
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }

    /**
     * @param array $parameters
     *
     * @return ParametrizedExceptionInterface
     */
    public function setParameters(array $parameters): ParametrizedExceptionInterface
    {
        $this->parameters = $parameters;

        return $this;
    }
}
