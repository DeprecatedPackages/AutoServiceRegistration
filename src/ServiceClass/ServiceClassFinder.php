<?php declare(strict_types=1);

namespace Symplify\AutoServiceRegistration\ServiceClass;

use Nette\Loaders\RobotLoader;

final class ServiceClassFinder
{
    /**
     * @param string[] $dirs
     * @param string[] $classSuffixesToSeek
     * @return string[]
     */
    public function findServicesInDirsByClassSuffix(array $dirs, array $classSuffixesToSeek): array
    {
        $robot = new RobotLoader;
        foreach ($dirs as $dir) {
            $robot->addDirectory($dir);
        }
        $robot->ignoreDirs .= ', Tests';
        $robot->acceptFiles = '*' . implode('.php,*', $classSuffixesToSeek) . '.php';
        $robot->rebuild();

        return array_keys($robot->getIndexedClasses());
    }
}
