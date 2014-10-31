<?php namespace Anomaly\Streams\Addon\Extension\UsersModuleBlockedCheck;

use Anomaly\Streams\Addon\Module\Users\Block\Contract\BlockRepositoryInterface;
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

    /**
     * The block repository object.
     *
     * @var
     */
    protected $blocks;

    /**
     * Create a new UsersModuleBlockedCheckExtension instance.
     *
     * @param BlockRepositoryInterface $blocks
     */
    function __construct(BlockRepositoryInterface $blocks)
    {
        $this->blocks = $blocks;
    }

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
        if ($block = $this->blocks->findBlockByUserId($user->getId())) {

            throw new UserBlockedException("Your account has been blocked.");
        }
    }
}
 