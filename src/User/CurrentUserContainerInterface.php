<?php
/**
 * Created by cvident-backend-api.
 * User: ssp
 * Date: 13.09.16
 * Time: 11:37.
 */
namespace NorseDigital\Symfony\RestBundle\User;

/**
 * Interface CurrentUserContainerInterface.
 */
interface CurrentUserContainerInterface
{
    /**
     * @return UserInterface
     */
    public function getCurrentUser() : UserInterface;

    /**
     * @param UserInterface $currentUser
     *
     * @return CurrentUserContainerInterface
     */
    public function setCurrentUser(UserInterface $currentUser) : self;

    /**
     * @param string $token
     */
    public function initCurrentUserByToken(string $token);

    /**
     * @param string $token
     *
     * @return UserInterface
     */
    public function getUserByToken(string $token): UserInterface;
}
