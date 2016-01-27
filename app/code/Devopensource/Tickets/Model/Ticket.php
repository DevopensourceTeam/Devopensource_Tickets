<?php
/**
 * @category Devopensource
 * @package Devopensource_Tickets
 * @author Jose Ruzafa <jose.ruzafa@devopensource.com>
 * @version 1.0.0
 * @copyright Copyright (c) 2016 Devopensource
 * @license http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */
namespace Devopensource\Tickets\Model;

class Ticket extends \Magento\Framework\Model\AbstractModel
{

    const STATUS_OPENED = 1;

    const STATUS_CLOSED = 2;

    const SEVERITY_LOW = 1;

    const SEVERITY_MEDIUM = 2;

    const SEVERITY_HIGH = 3;

    protected static $statusesOptions = [
        self::STATUS_OPENED => 'Opened',
        self::STATUS_CLOSED => 'Closed',

    ];

    protected static $severitiesOptions = [
        self::SEVERITY_LOW => 'Low',
        self::SEVERITY_MEDIUM => 'Medium',
        self::SEVERITY_HIGH => 'High',

    ];

    /**
     * Initialize resource model
     * @return void
     */

    protected function _construct()
    {

        $this->_init('Devopensource\Tickets\Model\ResourceModel\Ticket');

    }

    public static function getSeveritiesOptionArray()
    {
        $result = [];

        foreach (self::$severitiesOptions as $value => $label) {
            $result[] = [
                'label' => $label,
                'value' => $value
            ];
        }

        return $result;
    }

    public static function getStatusesOptionArray()
    {
        $result = [];

        foreach (self::$statusesOptions as $value => $label) {
            $result[] = [
                'label' => $label,
                'value' => $value
            ];
        }

        return $result;
    }


    public function getStatusAsLabel()
    {
        return self::$statusesOptions[$this->getStatus()];

    }

    public function getSeverityAsLabel()
    {
        return self::$severitiesOptions[$this->getSeverity()];

    }

}