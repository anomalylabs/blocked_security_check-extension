<?php namespace Anomaly\BlockedCheckExtension;

use Anomaly\UsersModule\User\Contract\UserInterface;
use Anomaly\UsersModule\User\UserCheck;

/**
 * Class BlockedCheckExtension
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Extension\BlockedCheckExtension
 */
class BlockedCheckExtension extends UserCheck
{

    /**
     * Check authorization of the current user.
     *
     * @param UserInterface $user
     */
    public function check(UserInterface $user = null)
    {
        // TODO: Implement check() method.
    }

    /**
     * Check authorization of the current user during login.
     *
     * @param UserInterface $user
     */
    public function checkLogin(UserInterface $user = null)
    {
        // TODO: Implement checkLogin() method.
    }
}
 