<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CourseSeeder extends Seeder
{
    public function run()
    {
        //

        $data = [[

            'course_name' => 'Diploma of Education',
            'course_code'    => 'DOE'
        ],
        [

            'course_name' => 'Diploma in Computer Science',
            'course_code'    => 'DCS'
        ],
        [

            'course_name' => 'Diploma in Engineering',
            'course_code'    => 'DE'
        ],
        [

            'course_name' => 'Diploma of Accountancy',
            'course_code'    => 'DOA'
        ],

];

    // Simple Queries
    foreach($data as $row){
        $this->db->query("INSERT INTO course (course_name, course_code) VALUES(:course_name:, :course_code:)", $row);
    }
    

    }
}
