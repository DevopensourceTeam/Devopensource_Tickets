<?php
/**
 * @category Devopensource
 * @package Devopensource_Tickets
 * @author Jose Ruzafa <jose.ruzafa@devopensource.com>
 * @version 1.0.0
 * @copyright Copyright (c) 2016 Devopensource
 * @license http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */
namespace Devopensource\Tickets\Controller\Adminhtml\Ticket;

class Grid extends \Devopensource\Tickets\Controller\Adminhtml\Ticket
{
    public function execute()
    {
        // indicamos false al metodo loadLayout para que no cargue todo el layout ya que se
        // devuelve para peticion ajax
        $this->_view->loadLayout(false);
        $this->_view->renderLayout();
    }
}
