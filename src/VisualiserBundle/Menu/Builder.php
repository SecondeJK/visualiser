<?php
namespace VisualiserBunder\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

class Builder implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');

        $menu->addChild('Home', array('route' => 'homepage'));
        
        // create another menu item
        $menu->addChild('Visual Libraries', array('route' => 'homepage'));
		$menu->addChild('Dashboard Examples', array('route' => 'homepage'));
		$menu->addChild('App ToDo List', array('route' => 'homepage'));
		
        return $menu;
    }
}
