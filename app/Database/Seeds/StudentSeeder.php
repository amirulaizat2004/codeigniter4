<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class StudentSeeder extends Seeder
{
    public function run()
    {
        //
        for ($i=0; $i <5 ; $i++) { 
            # code...
     
        $data = [

            'student_name' => static::faker('ms_MY')->name('ms_MY'),
            'address'    => static::faker('ms_MY')->address,
            'email'=>static::faker('ms_MY')->email,
            'ic'=>str_replace('-','',static::faker('ms_MY')->ssn)

];

    
        $this->db->table('student')->insert($data);
    
   }

    }
}
