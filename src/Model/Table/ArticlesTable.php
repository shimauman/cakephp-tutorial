<?php

namespace App\Model\Table;

use Cake\ORM\Table;

class ArticlesTable extends Table
{
    public function initialize(array $config) : void
    {
        // NOTE: このテーブルの created や modified カラムを自動的に更新する Timestamp ビヘイビアー
        $this->addBehavior('Timestamp');
    }
}