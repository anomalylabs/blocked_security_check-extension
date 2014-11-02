<?php namespace Anomaly\Streams\Addon\Extension\UsersModuleBlockedCheck;

use Anomaly\Streams\Addon\Module\Users\Block\Contract\BlockRepositoryInterface;
use Anomaly\Streams\Addon\Module\Users\Exception\UserBlockedException;
use Anomaly\Streams\Addon\Module\Users\User\Contract\UserInterface;

/**
 * Class UsersModuleBlockedCheckExtensionHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Extension\UsersModuleBlockedCheck
 */
class UsersModuleBlockedCheckExtensionHandler
{

    /**
     * Security check during login.
     *
     * @param BlockRepositoryInterface $blocks
     * @param UserInterface            $user
     */
    public function login(BlockRepositoryInterface $blocks, UserInterface $user)
    {
        $this->checkBlockedStatus($blocks, $user);
    }

    /**
     * Security check during authorization check.
     *
     * @param BlockRepositoryInterface $blocks
     * @param UserInterface            $user
     */
    public function check(BlockRepositoryInterface $blocks, UserInterface $user)
    {
        $this->checkBlockedStatus($blocks, $user);
    }

    /**
     * Check the blocked status of a user.
     *
     * @param BlockRepositoryInterface $blocks
     * @param UserInterface            $user
     * @throws \Anomaly\Streams\Addon\Module\Users\Exception\UserBlockedException
     */
    protected function checkBlockedStatus(BlockRepositoryInterface $blocks, UserInterface $user)
    {
        if ($block = $blocks->findBlockByUserId($user->getId())) {

            throw new UserBlockedException("Your account has been blocked.");
        }
    }
}
 