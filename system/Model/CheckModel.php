<?php

namespace System\Model;

use Engine\Service\AbstractModel;

class CheckModel extends AbstractModel
{
    private $checkParams;

    public function setCheckParams($params)
    {
        $this->checkParams = $params;
    }

    public function runCheck($postData)
    {
        foreach ($this->checkParams as $key => $value) {
            if (empty($postData[$key])) {
                return false;
            }

            if (strlen($postData[$key]) > (int)$value) {
                return false;
            }
        }

        return true;
    }
}