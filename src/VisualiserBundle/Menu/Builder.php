<?php
namespace VisualiserBundle\Menu;

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
        $menu->addChild('Visual Libraries', array('route' => 'homepage'));
		$menu->addChild('Dashboard Examples', array('route' => 'visualiser_dashboard'));
		
		//$menu['Visual Libraries']->setParentAttributes(array('class' => 'dropdown-menu'));
		$menu['Visual Libraries']->addChild('Google Charts', array('route' => 'visualiser_googlecharts'));
		$menu['Visual Libraries']->addChild('d3js', array('route' => 'visualiser_d3js'));
		$menu['Visual Libraries']->addChild('HighCharts', array('route' => 'visualiser_dashboard'));
		$menu->addChild('App ToDo List', array('route' => 'visualiser_todo_index'));
		
		$menu->setChildrenAttributes(array('class' => 'nav navbar-nav'));

		// some reverse engineering required
		dump(get_class_methods($menu));
		dump($menu);
        return $menu;	
    }
}
