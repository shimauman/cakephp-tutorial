<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

class ProductsSeed extends AbstractSeed
{
    /**
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'product 1',
                'description' => 'product 1 description',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'product 2',
                'description' => 'product 2 description',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'product 3',
                'description' => 'product 3 description',
                'created' => date('Y-m-d H:i:s'),
                'modified' => date('Y-m-d H:i:s'),
            ],
        ];

        $table = $this->table('products');
        $table->insert($data)->save();
    }
}
