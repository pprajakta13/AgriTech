<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateProfitCalculationsTable extends Migration
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

            'land_area' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
            ],

            'production_qty' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
            ],

            'selling_price' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
            ],

            'total_cost' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
            ],

            'profit' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
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

        $this->forge->createTable('profit_calculations');
    }

    public function down()
    {
        $this->forge->dropTable('profit_calculations');
    }
}