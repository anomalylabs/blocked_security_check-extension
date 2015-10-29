<?php namespace Anomaly\SuspensionSecurityCheckExtension;

use Anomaly\Streams\Platform\Message\MessageBag;
use Anomaly\UsersModule\User\Contract\UserInterface;
use Anomaly\UsersModule\User\UserAuthenticator;

/**
 * Class SuspensionSecurityCheckHandler
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\SuspensionSecurityCheckExtension
 */
class SuspensionSecurityCheckHandler
{

    /**
     * The message bag.
     *
     * @var MessageBag
     */
    protected $messages;

    /**
     * The authenticator utility.
     *
     * @var UserAuthenticator
     */
    protected $authenticator;

    /**
     * Create a new ActivationSecurityCheckHandler instance.
     *
     * @param MessageBag        $messages
     * @param UserAuthenticator $authenticator
     */
    public function __construct(MessageBag $messages, UserAuthenticator $authenticator)
    {
        $this->messages      = $messages;
        $this->authenticator = $authenticator;
    }

    /**
     * Handle the security check.
     *
     * @param UserInterface $user
     * @return bool
     */
    public function handle(UserInterface $user = null)
    {
        if ($user && $user->isSuspended()) {

            $this->authenticator->kickOut($user, 'suspended');

            $this->messages->error('anomaly.extension.suspension_security_check::error.suspension');

            return false;
        }

        return true;
    }
}
