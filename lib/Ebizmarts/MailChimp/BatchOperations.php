<?php
/**
 * mailchimp-lib Magento Component
 *
 * @category  Ebizmarts
 * @package   mailchimp-lib
 * @author    Ebizmarts Team <info@ebizmarts.com>
 * @copyright Ebizmarts (http://ebizmarts.com)
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @date:     4/29/16 3:51 PM
 * @file:     BatchOperations.php
 */
class MailChimp_BatchOperations extends MailChimp_Abstract
{
    /**
     * @param $operations       An array of objects that describes operations to perform.
     * @return mixed
     * @throws MailChimp_Error
     * @throws MailChimp_HttpError
     */
    public function add($operations)
    {
        return $this->_master->call('batches', $operations, Ebizmarts_MailChimp::POST, false);
    }

    /**
     * @param $id               The unique id for the batch operation.
     * @param $fields           A comma-separated list of fields to return. Reference parameters of sub-objects
     *                          with dot notation.
     * @param $excludeFields    A comma-separated list of fields to exclude. Reference parameters of sub-objects
     *                          with dot notation.
     * @return mixed
     * @throws MailChimp_Error
     * @throws MailChimp_HttpError
     */
    public function status($id,$fields=null,$excludeFields=null)
    {
        $_params = array();
        if($fields) { $_params['fields'] = $fields;
        }
        if($excludeFields) { $_params['exclude_fields'] = $excludeFields;
        }
        return $this->_master->call('batches/'.$id, $_params, Ebizmarts_MailChimp::GET);
    }

    /**
     * @param $fields           A comma-separated list of fields to return. Reference parameters of sub-objects
     *                          with dot notation.
     * @param $excludeFields    A comma-separated list of fields to exclude. Reference parameters of sub-objects with
     *                          dot notation.
     * @param $count            The number of records to return.
     * @param $offset           The number of records from a collection to skip. Iterating over large collections with
     *                          this parameter can be slow.
     * @return mixed
     * @throws MailChimp_Error
     * @throws MailChimp_HttpError
     */
    public function getAll($fields=null,$excludeFields=null,$count=null,$offset=null)
    {
        $_params = array();
        if($fields) { $_params['fields'] = $fields;
        }
        if($excludeFields) { $_params['exclude_fields'] = $excludeFields;
        }
        if($count) { $_params['count'] = $count;
        }
        if($offset) { $_params['offset'] = $offset;
        }
        return $this->_master->call('batches', $_params, Ebizmarts_MailChimp::GET);
    }
}
