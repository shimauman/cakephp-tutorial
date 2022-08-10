<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Article extends Entity
{
    // NOTE: 一括代入 (Mass Assignment) によって どのようにプロパティーを変更できるかを制御するプロパティー
    protected $_accessible = [
        '*' => true,
        'id' => false,
        'slug' => false,
    ];
}