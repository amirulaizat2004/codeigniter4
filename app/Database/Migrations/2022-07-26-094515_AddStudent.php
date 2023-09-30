<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddStudent extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id'          => [
                    'type'           => 'INT',
                    'auto_increment' => true,
            ],
            'student_name'       => [
                    'type' => 'VARCHAR',
                    'constraint' => '100',
                    
            ],
            'matrik_number' => [
                    'type' => 'INT',
    
            ],
            'state' => [
                'type' => 'VARCHAR',
                'constraint' => '100',

            ],
            'id_course1' => [
                'type' => 'INT',
                  
            ],
            'id_course2' => [
                'type' => 'INT',
              
            ],

            'created_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'update_at DATETIME DEFAULT CURRENT_TIMESTAMP',
            'delete_at DATETIME DEFAULT NULL',
        ]);

            $this->forge->addKey('id', true);
            $this->forge->addForeignKey('id_course1','course','id');
            $this->forge->addForeignKey('id_course2','course','id');
            // $this->forge->addUniqueKey('email');
            $this->forge->createTable('student');

    }

    public function down()
    {
        //
        // $this->forge->dropTable('student');
    }
}
