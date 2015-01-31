<?php namespace Anomaly\BlockedSecurityCheckExtension;

use Anomaly\Streams\Platform\Message\MessageBag;
use Anomaly\UsersModule\Security\SecurityCheckExtension;
use Anomaly\UsersModule\User\Contract\UserInterface;
use Illuminate\Auth\Guard;
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
     * The authorization guard.
     *
     * @var Guard
     */
    protected $guard;

    /**
     * The message bag.
     *
     * @var MessageBag
     */
    protected $messages;

    /**
     * Create a new BlockedSecurityCheckExtension instance.
     *
     * @param Guard      $guard
     * @param MessageBag $messages
     */
    public function __construct(Guard $guard, MessageBag $messages)
    {
        $this->guard    = $guard;
        $this->messages = $messages;
    }

    /**
     * Run the security check.
     *
     * @param Request       $request
     * @param UserInterface $user
     * @return void|Response
     */
    public function check(Request $request, UserInterface $user = null)
    {
        if ($user && $user->isBlocked()) {

            app('auth')->logout($user);

            $this->messages->error(trans('anomaly.extension.blocked_security_check::error.blocked'));

            return redirect('admin/login');
        }
    }
}
 