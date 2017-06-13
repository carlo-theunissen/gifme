<?php
/**
 * Created by PhpStorm.
 * User: carlotheunissen
 * Date: 13/06/2017
 * Time: 23:33
 */

namespace ApiBundle\Security;


use ApiBundle\Entity\LambdaUser;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

class LambdaUserProvider implements UserProviderInterface
{

    public function loadUserByUsername($username)
    {
        return new LambdaUser($username);
    }

    public function refreshUser(UserInterface $user)
    {
        return new LambdaUser($user->getUsername());
    }

    public function supportsClass($class)
    {
        return LambdaUser::class === $class;
    }
}