<?php namespace Anomaly\BlockedSecurityCheckExtension;

use Anomaly\UsersModule\Security\SecurityCheckExtension;
use Anomaly\UsersModule\User\Contract\UserInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Class BlockedSecurityCheckExtension
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Extension\BlockedSecurityCheckExtension
 */
class BlockedSecurityCheckExtension extends SecurityCheckExtension
{

    /**
     * This extension provides a security check
     * for users that assures the user is not blocked.
     *
     * @var string
     */
    protected $provides = 'anomaly.module.users::security_check.blocked';

    /**
     * Run the security check.
     *
     * @param Request       $request
     * @param UserInterface $user
     * @return void|Response
     */
    public function check(Request $request, UserInterface $user = null)
    {
    }
}
 