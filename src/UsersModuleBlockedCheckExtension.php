<?php namespace Anomaly\Streams\Addon\Extension\UsersModuleBlockedCheck;

use Anomaly\Streams\Addon\Module\Users\Block\BlockModel;
use Anomaly\Streams\Addon\Module\Users\Exception\UserBlockedException;
use Anomaly\Streams\Addon\Module\Users\Extension\CheckInterface;
use Anomaly\Streams\Addon\Module\Users\User\Contract\UserInterface;
use Anomaly\Streams\Platform\Addon\Extension\ExtensionAddon;

/**
 * Class UsersModuleBlockedCheckExtension
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Extension\UsersModuleBlockedCheckExtension
 */
class UsersModuleBlockedCheckExtension extends ExtensionAddon implements CheckInterface
{

    // TODO: make addons from IoC so the constructors are sexy.

    /**
     * Security check during login.
     *
     * @param UserInterface $user
     * @return mixed
     */
    public function login(UserInterface $user)
    {
        $this->checkBlockedStatus($user);
    }

    /**
     * Security check during authorization check.
     *
     * @return mixed
     */
    public function check(UserInterface $user)
    {
        $this->checkBlockedStatus($user);
    }

    /**
     * Check the blocked status of a user.
     *
     * @param UserInterface $user
     */
    protected function checkBlockedStatus(UserInterface $user)
    {
        $repository = new BlockModel();

        if ($block = $repository->findBlockByUserId($user->getUserId())) {

            throw new UserBlockedException("Your account has been blocked.");
        }
    }
}
 