<?php
/**
 * Created by rest-bundle.
 * User: ssp
 * Date: 27.07.16
 * Time: 13:14.
 */
namespace NorseDigital\Symfony\RestBundle\Service;

use Doctrine\Common\Persistence\ObjectRepository;
use NorseDigital\Symfony\RestBundle\Entity\EntityInterface;
use NorseDigital\Symfony\RestBundle\Request\ListRequestInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\DependencyInjection\ContainerInterface;

abstract class AbstractService implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    /**
     * @var string
     */
    protected $entityClass;

    /**
     * @var ObjectRepository
     */
    protected $repository;

    /**
     * AbstractService constructor.
     *
     * @param ContainerInterface $container
     * @param string             $entityClass
     */
    public function __construct(ContainerInterface $container, $entityClass)
    {
        $this->setContainer($container);
        $this->entityClass = $entityClass;
        $this->repository = $this->getManager()->getRepository($entityClass);
    }

    /**
     * @return EntityInterface[]
     */
    public function getEntities() : array
    {
        return $this->repository->findAll();
    }

    /**
     * @param array $criteria
     * @param array $orderBy
     * @param int   $limit
     * @param int   $offset
     *
     * @return EntityInterface[]
     */
    public function getEntitiesBy(array $criteria, array $orderBy = null, $limit = null, $offset = null) : array
    {
        return $this->repository->findBy($criteria, $orderBy, $limit, $offset);
    }

    /**
     * @return EntityInterface
     */
    public function createEntity() : EntityInterface
    {
        return new $this->entityClass();
    }

    /**
     * @param EntityInterface $entity
     */
    public function saveEntity(EntityInterface $entity)
    {
        $this->persist($entity);
        $this->flush();
    }

    /**
     * @return \Doctrine\Common\Persistence\ObjectManager|object
     */
    protected function getManager()
    {
        return $this->container->get('doctrine')->getManager();
    }

    /**
     * @param EntityInterface $entity
     */
    public function persist(EntityInterface $entity)
    {
        $this->getManager()->persist($entity);
    }

    public function flush()
    {
        $this->getManager()->flush();
    }

    /**
     * @param EntityInterface $entity
     * @param bool            $flush
     */
    public function deleteEntity(EntityInterface $entity, bool $flush = true)
    {
        $entity->setDeletedAt(new \DateTime());
        $this->persist($entity);

        if ($flush) {
            $this->flush();
        }
    }

    /**
     * @param EntityInterface $entity
     * @param bool            $flush
     */
    public function restoreEntity(EntityInterface $entity, bool $flush = true)
    {
        $entity->setDeletedAt(null);
        $this->persist($entity);

        if ($flush) {
            $this->flush();
        }
    }

    /**
     * @param array $criteria
     *
     * @return EntityInterface
     */
    public function getEntityBy(array $criteria) : EntityInterface
    {
        return $this->repository->findOneBy($criteria);
    }

    /**
     * @param int $id
     *
     * @return EntityInterface
     */
    public function getEntity(int $id) : EntityInterface
    {
        return $this->repository->find($id);
    }

    /**
     * @param array                $criteria
     * @param ListRequestInterface $request
     *
     * @return EntityInterface[]
     */
    public function getEntitiesByWithListRequest(array $criteria, ListRequestInterface $request)
    {
        return $this->getEntitiesBy(
            $criteria,
            [$request->getSort() => $request->getOrder()],
            $request->getLimit(),
            ($request->getPage() - 1) * $request->getLimit()
        );
    }
}
