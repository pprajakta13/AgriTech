<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCropsTable extends Migration
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

            'crop_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],

            'category' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
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

        $this->forge->createTable('crops');
    }

    public function down()
    {
        $this->forge->dropTable('crops');
    }
}