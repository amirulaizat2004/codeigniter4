<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddCourse extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id'          => [
                    'type'           => 'INT',
                    'auto_increment' => true,
            ],
            'course_name'       => [
                    'type'       => 'TEXT',
                    
            ],
            'course_code' => [
                    'type' => 'VARCHAR',
                    'constraint' => '100',
            ],
            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'update_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'delete_at DATETIME DEFAULT NULL',
        ]);

            $this->forge->addKey('id', true);
            $this->forge->createTable('course');
    }

    public function down()
    {
        //
        // $this->forge->dropTable('course');
    }
}
