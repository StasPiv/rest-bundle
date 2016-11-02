<?php
/**
 * Created by cvident-backend-api.
 * User: ssp
 * Date: 02.11.16
 * Time: 11:27.
 */
namespace NorseDigital\Symfony\RestBundle\Exception\Entity;

use Doctrine\ORM\EntityNotFoundException;

class DeletedEntityFoundException extends EntityNotFoundException
{
}
