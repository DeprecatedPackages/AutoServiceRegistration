<?php declare(strict_types=1);

namespace Symplify\AutoServiceRegistration\Tests\Adapter\Symfony;

use PHPUnit\Framework\TestCase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symplify\AutoServiceRegistration\Naming\ServiceNaming;
use Symplify\AutoServiceRegistration\Tests\Adapter\Symfony\CompleteTestSource\AnotherController;

final class CompleteTest extends TestCase
{
    /**
     * @var ContainerInterface
     */
    private $container;

    protected function setUp(): void
    {
        $kernel = new AppKernel;
        $kernel->boot();

        $this->container = $kernel->getContainer();
    }

    public function testGetController(): void
    {
        $serviceId = ServiceNaming::createServiceIdFromClass(AnotherController::class);

        $this->assertInstanceOf(AnotherController::class, $this->container->get($serviceId));
    }
}
