<?php

namespace Thanhnt84\Duan1\Models;

use Thanhnt84\Duan1\Commons\Model;

class Cart extends Model 
{
    protected string $tableName = 'carts';

    public function findByUserID($userID)
    {
        return $this->queryBuilder
            ->select('*')
            ->from($this->tableName)
            ->where('user_id = ?')
            ->setParameter(0, $userID)
            ->fetchAssociative();
    }
}
