<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMandiPricesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],

            'crop_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],

            'market_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],

            'price_per_quintal' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
            ],

            'price_date' => [
                'type' => 'DATE',
            ],

            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],

            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addKey('crop_id');

        $this->forge->addForeignKey(
            'crop_id',
            'crops',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->forge->createTable('mandi_prices');
    }

    public function down()
    {
        $this->forge->dropTable('mandi_prices');
    }
}