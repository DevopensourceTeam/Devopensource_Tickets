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

class Index extends \Devopensource\Tickets\Controller\Adminhtml\Ticket
{
    public function execute()
    {
        if ($this->getRequest()->getQuery('ajax')) {
            $resultForward = $this->resultForwardFactory->create();
            $resultForward->forward('grid');
            return $resultForward;
        }
        $resultPage = $this->resultPageFactory->create();

        $resultPage->setActiveMenu('Devopensource_Tickets::ticket_manage');
        $resultPage->getConfig()->getTitle()->prepend(__('Tickets'));

        $resultPage->addBreadcrumb(__('Tickets'), __('Tickets'));
        $resultPage->addBreadcrumb(__('Manage Tickets'), __('Manage Tickets'));

        return $resultPage;
    }
}
