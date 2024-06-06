<?php

namespace App;

use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;

class Kernel extends BaseKernel
{
    use MicroKernelTrait;
}
// registerBundles()
/* if (in_array($this->getEnvironment(), ['dev', 'test'], true)) { */
    // ...
/*     $bundles[] = new Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle();
} */