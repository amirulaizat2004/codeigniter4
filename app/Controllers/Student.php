<?php

namespace App\Controllers;

use App\Models\StudentModel;
use App\Helpers\BankStatusHelper;
use App\Controllers\BaseController;

class Student extends BaseController
{
    public function index()
    {
        //
        echo "controller index $this->nama" ;

        // return view ('student/formstudent');
    }

    public function form()
    {
        $d['title'] = 'Borang Maklumat Pelajar';
        $d['validation']=\Config\Services::validation();
// dd($d['validation']);
        $d['course'] = BankStatusHelper::getCourseAll();
        $d['state'] = BankStatusHelper::getState();
        $d['gender'] = BankStatusHelper::getGender();

        return view ('student/formstudent',$d);
    }

    public function store()
    {
        
        $validation = $this->validate([
        'student_name' => [
            'rules' => 'required',
            'errors' => ['required' => 'Sila isi nama anda'],
        ],
        'matrik_number' => [
            'rules' => 'required|is_unique[student.matrik_number]',
            'errors' => [
                'required' => 'Sila isi nombor matrik',
                'is_unique' => 'No matrik sudah terdaftar'],
        ],
        'state' => 'required',
        'id_course1' => 'required',
        'id_course2' => 'required',
        'gender' => 'required',
       
        ]);
        // dd($validation);
        if(!$validation){

        return redirect()->back()->withInput();
        }

        $model = new StudentModel();
        $datapost=$this->request->getVar();
// dd($datapost);
        if($model->insert($datapost)){

        return redirect()->to('display-student')->with('status','berjaya');

        
        }

        return redirect()->back()->withInput();
    }

    public function storeFile()
    {
        
        $validation = $this->validate([
        'student_name' => [
            'rules' => 'required',
            'errors' => ['required' => 'Sila isi nama anda'],
        ],
        'matrik_number' => [
            'rules' => 'required|is_unique[student.matrik_number]',
            'errors' => [
                'required' => 'Sila isi nombor matrik',
                'is_unique' => 'No matrik sudah terdaftar'],
        ],
        'state' => 'required',
        'id_course1' => 'required',
        'id_course2' => 'required',
        'gender' => 'required',
        'userfile' => [
            'label' => 'File',
            'rules' => 'uploaded[userfile]'
                . '|mime_in[userfile,application/pdf]'
                . '|max_size[userfile,1000000]',
        ],
        ]);
        // dd($validation);
        if(!$validation){

        return redirect()->back()->withInput();
        }

        $model = new StudentModel();
        $datapost=$this->request->getVar();
// dd($datapost);
        if($model->insert($datapost)){

        return redirect()->to('display-student')->with('status','berjaya');

        
        }

        return redirect()->back()->withInput();
    }
    
    public function displayStudent()
    {
        $d['title']= 'Borang Maklumat Pelajar';
        
        $model = new StudentModel();
        // $d['model']=$model->findAll();
        // dd($d['model']);
        $model->select('student.*, c1.course_name as course1, c2.course_name as course2');
        $model->join('course as c1', 'c1.id = student.id_course1', 'left');
        $model->join('course as c2', 'c2.id = student.id_course2', 'left');
       
        if($this->request->getVar('student_name')??''){
               $model->like('student_name', $this->request->getVar('student_name'), 'both');
        }
        
        if($this->request->getVar('matric_number')??''){
                $model->like('matric_number', $this->request->getVar('matric_number'), 'both');
        }
        
        // $d['model']=$model->findAll();
        // dd($d['model']);
        $d['model']=$model->paginate(5,'std');
        $d['pager']=$model->pager;

        $dpager= BankStatusHelper::countFrom($model->pager);

        $d['count']=$dpager['count'];
        $d['show']=$dpager['show'];

        return view ('student/display',$d);
    }

    public function editStudent($id) {

        $d['title'] = 'Kemaskini Maklumat Pelajar';
        $d['validation']=\Config\Services::validation();
        $d['course'] = BankStatusHelper::getCourseAll();
        $d['state'] = BankStatusHelper::getState();
        $d['gender'] = BankStatusHelper::getGender();
        
        $model = new StudentModel();
        $d['model'] = $model->find($id);

        return view('student/edit',$d);
    }

    public function updateStudent($id) {

    $validation = $this->validate([
        'student_name' => [
            'rules' => 'required',
            'errors' => ['required' => 'Sila isi nama anda'],
        ],
        'matrik_number' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'Sila isi nombor matrik'],
        ],
        'state' => 'required',
        'id_course1' => 'required',
        'id_course2' => 'required',
        'gender' => 'required',
       
        ]);
        // dd($validation);
        if(!$validation){

        return redirect()->back()->withInput();
        }

        $model = new StudentModel();
        $datapost=$this->request->getVar();
        $datapost['id']=$id;

    // dd($datapost);
        if($model->save($datapost)){

        return redirect()->to('display-student')->with('status','berjaya');

        
        }

        return redirect()->back()->withInput();
    }

    public function deleteStudent($id) {

        // if($this->request->getMethod()=='delete'){


            // $modelapp=new StudentModel();
        
            // $modelapp->where(['id_student'=>$id]);
        
            // if($modelapp->delete()){
        
                $model=new StudentModel();
        
                if($model->delete($id)){
                    return redirect()->to('display-student')->with('status', 'berjaya');
        
                } else {
                    return redirect()->back()->withInput();
                }
        
            // }
        
           
        
        
        
        // }else{
        
        //     print('bukan method delete');
        // }
        

    }
}
