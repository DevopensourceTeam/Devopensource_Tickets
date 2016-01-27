<?php
/**
 * @category Devopensource
 * @package Devopensource_Tickets
 * @author Jose Ruzafa <jose.ruzafa@devopensource.com>
 * @version 1.0.0
 * @copyright Copyright (c) 2016 Devopensource
 * @license http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */
namespace Devopensource\Tickets\Controller;

abstract class Ticket extends \Magento\Framework\App\Action\Action
{

    protected $customerSession;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Customer\Model\Session $customerSession
    )
    {

        $this->customerSession = $customerSession;
        parent::__construct($context);

    }

    public function dispatch(\Magento\Framework\App\RequestInterface $request)

    {

        if (!$this->customerSession->authenticate()) {

            $this->_actionFlag->set('', 'no-dispatch', true);

            if (!$this->customerSession->getBeforeUrl()) {

                $this->customerSession->setBeforeUrl($this->_redirect->getRefererUrl());

            }

        }

        return parent::dispatch($request);

    }
}