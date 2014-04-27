<?php

namespace Eye4web\ZfcUserRDT\Factory\Inspector;

use Eye4web\ZfcUserRDT\Inspector\UserInspector;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Factory responsible for instantiating a {@see \Eye4web\ZfcUserRDT\Inspector\UserInspector}
 */
class UserInspectorFactory implements FactoryInterface
{
    /**
     * {@inheritDoc}
     *
     * @return FileInspectionRepository
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $authService = $serviceLocator->get('zfcuser_auth_service');
        $userHydrator = $serviceLocator->get('zfcuser_user_hydrator');
        return new UserInspector($authService, $userHydrator);
    }
}
