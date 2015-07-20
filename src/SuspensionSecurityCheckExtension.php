<?php namespace Anomaly\SuspensionSecurityCheckExtension;

use Anomaly\UsersModule\Security\SecurityCheckExtension;

/**
 * Class SuspensionSecurityCheckExtension
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\Streams\Addon\Extension\SuspensionSecurityCheckExtension
 */
class SuspensionSecurityCheckExtension extends SecurityCheckExtension
{

    /**
     * This extension provides a security check
     * for users that assures the user is not suspension.
     *
     * @var string
     */
    protected $provides = 'anomaly.module.users::security_check.suspension';

}
 