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
        $menu->addChild('Visual Libraries', array('route' => 'homepage', 'extra' => array('safe_label' => true)));
		$menu->addChild('Dashboard Examples', array('route' => 'visualiser_dashboard'));
		$menu->addChild('App ToDo List', array('route' => 'visualiser_todo_index'));
		
		$menu['Visual Libraries']->setAttributes(array('class' => 'dropdown'));
		$menu['Visual Libraries']->setLinkAttributes(array('class' => 'dropdown-toggle', 'data-toggle' => 'dropdown', 'role' => 'button', 'aria-haspopup' => 'true', 'aria-expanded' => 'false'));
		$menu['Visual Libraries']->setChildrenAttributes(array('class' => 'dropdown-menu'));		
		$menu['Visual Libraries']->addChild('Google Charts', array('route' => 'visualiser_googlecharts'));
		$menu['Visual Libraries']->addChild('d3js', array('route' => 'visualiser_d3js'));
		$menu['Visual Libraries']->addChild('HighCharts', array('route' => 'visualiser_dashboard'));
		$menu['Visual Libraries']->setLabel('Visual Libraries<span class="caret"></span>');
		
		$menu->setChildrenAttributes(array('class' => 'nav navbar-nav'));
        return $menu;	
    }
}
