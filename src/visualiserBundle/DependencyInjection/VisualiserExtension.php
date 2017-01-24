<?php

namespace visualiserBundle\DependencyInjection;

use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Config\FileLocator;

class VisualiserExtension extends Extension
{
  public function load(array $configs, ContainerBuilder $container)
  {
    $fileLocator = new  FileLocator(__DIR__.'/../Resources/config');
    $loader = new YamlFileLoader($container);
  }
}
