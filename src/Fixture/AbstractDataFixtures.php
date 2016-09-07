<?php
/**
 * Created by rest-bundle.
 * User: ssp
 * Date: 27.07.16
 * Time: 13:12.
 */
namespace NorseDigital\Symfony\RestBundle\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use NorseDigital\Symfony\RestBundle\Entity\EntityInterface;
use NorseDigital\Symfony\RestBundle\Service\AbstractService;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

abstract class AbstractDataFixtures extends AbstractFixture implements ContainerAwareInterface, OrderedFixtureInterface
{
    use ContainerAwareTrait;

    /** @var array */
    protected $autoGeneratedFixtures = [];

    /**
     * @param array $data
     *
     * @return EntityInterface
     */
    abstract protected function createEntity(array $data) : EntityInterface;

    /**
     * @return AbstractService
     */
    abstract protected function getService(): AbstractService;

    /**
     * @return string
     */
    abstract protected function getPathToData() : string;

    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $this->processEntities($manager);
        $manager->flush();
    }

    /**
     * @return array
     */
    protected function getFixturesFromJsonFile()
    {
        $fileName = $this->getPathToData().(new \ReflectionClass($this))->getShortName().'.json';

        if (!file_exists($fileName)) {
            return [];
        }

        return json_decode(
            file_get_contents($fileName),
            true
        );
    }

    /**
     * @param ObjectManager $manager
     */
    protected function processEntities(ObjectManager $manager)
    {
        foreach (array_merge($this->autoGeneratedFixtures, $this->getFixturesFromJsonFile()) as $data) {
            $this->processEntity($data);
        }
    }

    /**
     * @return bool
     */
    protected function isTestMode()
    {
        return $this->container->getParameter('kernel.environment') == 'test';
    }

    /**
     * @param $data
     */
    protected function processEntity($data)
    {
        $entity = $this->createEntity($data);
        if (!is_object($entity)) {
            return;
        }
        $this->getService()->saveEntity($entity);
        $this->setReference($data['referenceName'], $entity);
    }
}
