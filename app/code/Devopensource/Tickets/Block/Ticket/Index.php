<?php
/**
 * @category Devopensource
 * @package Devopensource_Tickets
 * @author Jose Ruzafa <jose.ruzafa@devopensource.com>
 * @version 1.0.0
 * @copyright Copyright (c) 2016 Devopensource
 * @license http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */
namespace Devopensource\Tickets\Block\Ticket;

class Index extends \Magento\Framework\View\Element\Template
{
    /**
     * @var \Magento\Framework\Stdlib\DateTime
     */
    protected $dateTime;

    /**
     * @var \Magento\Customer\Model\Session
     */
    protected $customerSession;

    /**
     * @var \Devopensource\Tickets\Model\TicketFactory
     */
    protected $ticketFactory;

    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\Stdlib\DateTime $dateTime,
        \Magento\Customer\Model\Session $customerSession,
        \Devopensource\Tickets\Model\TicketFactory $ticketFactory,
        array $data = []
    )
    {
        $this->dateTime = $dateTime;
        $this->customerSession = $customerSession;
        $this->ticketFactory = $ticketFactory;
        parent::__construct($context, $data);
    }

    /**
     * @return \Devopensource\Tickets\Model\ResourceModel\Ticket\Collection
     */
    public function getTickets()
    {
        return $this->ticketFactory
            ->create()
            ->getCollection()
            ->addFieldToFilter('customer_id', $this->customerSession->getCustomerId());
    }

    public function getSeverities()
    {
        return \Devopensource\Tickets\Model\Ticket::getSeveritiesOptionArray();
    }
}
