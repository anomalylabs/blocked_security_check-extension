<?php namespace Anomaly\BlockedCheckExtension;

use Anomaly\UsersModule\User\Contract\UserInterface;
use Anomaly\UsersModule\User\UserCheck;
use Illuminate\Http\Request;

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
     * This extension provides a security check
     * for users that assures the user is not blocked.
     *
     * @var string
     */
    protected $provides = 'anomaly.module.users::check.blocked';

    /**
     * Check authorization of the current user.
     *
     * @param UserInterface $user
     */
    public function check(UserInterface $user = null, Request $request)
    {
    }
}
 