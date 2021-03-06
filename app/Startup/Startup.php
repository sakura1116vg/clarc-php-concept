<?php

namespace App\Startup;


use App\Application\InputPorts\User\Create\UserCreateInputPortInterface;
use App\Application\Interactors\User\Create\UserCreateInteractor;
use App\Application\OutputPorts\User\Create\UserCreateOutputPortInterface;
use App\InterfaceAdapters\Controllers\User\Create\UserCreateController;
use App\InterfaceAdapters\Presenters\User\Create\UserCreatePresenter;
use Clarc\Basis\Service\ServiceCollection;

/**
 * Class Startup
 * @package App\Startup
 */
class Startup
{
    /**
     * @param ServiceCollection $serviceCollection
     */
    public function configureService(ServiceCollection $serviceCollection)
    {
        $this->registerUsecases($serviceCollection);
    }

    /**
     * @param ServiceCollection $serviceCollection
     */
    private function registerUseCases(ServiceCollection $serviceCollection)
    {
        // UserCreate
        $serviceCollection->addTransient(UserCreateController::class);
        $serviceCollection->addTransient(UserCreateInputPortInterface::class, UserCreateInteractor::class);
        $serviceCollection->addTransient(UserCreateOutputPortInterface::class, UserCreatePresenter::class);
    }
}
