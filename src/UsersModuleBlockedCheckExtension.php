<?php namespace Anomaly\UsersModuleBlockedCheckExtension;

use Anomaly\Streams\Addon\Module\Users\Block\Contract\BlockInterface;
use Anomaly\Streams\Addon\Module\Users\User\Contract\UserInterface;
use Anomaly\Streams\Platform\Addon\Extension\Extension;

/**
 * Class UsersModuleBlockedCheckExtension
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Extension\UsersModuleBlockedCheckExtension
 */
class UsersModuleBlockedCheckExtension extends Extension
{

    /**
     * Perform security check at login.
     *
     * @param UserInterface $user
     * @return mixed
     */
    public function login(UserInterface $user)
    {
        $this->checkBlocked($user);
    }

    /**
     * Perform security check at authorization check.
     *
     * @param UserInterface $user
     * @return mixed
     */
    public function check(UserInterface $user)
    {
        $this->checkBlocked($user);
    }

    /**
     * Perform security check after failed login attempt.
     *
     * @param UserInterface $user
     * @return mixed
     */
    public function fail(UserInterface $user = null)
    {
        //
    }

    /**
     * Check blocked status.
     *
     * @param UserInterface $user
     * @throws UserBlockedException
     */
    protected function checkBlocked(UserInterface $user)
    {
        $block = $user->getBlock();

        if ($block instanceof BlockInterface) {

            throw new UserBlockedException("Your account has been blocked.");
        }
    }
}
 