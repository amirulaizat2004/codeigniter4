<?php

namespace App\Helpers;

use App\Models\CourseModel;



class BankStatusHelper 
{

    public static function countFrom($pager){

        //  dd($pager);
        $totalAll=$pager->getTotal('std');

        $getperPage=$pager->getperPage('std');
        $currentPage=$pager->getcurrentPage('std');
        $pageCount=$pager->getpageCount('std');
        
        // if($currentPage > 1 && $currentPage !=$pageCount ){
            if($currentPage > 1  ){
            $currentPagenow=$currentPage-1;
            $total=$getperPage*$currentPagenow;

        // }elseif($currentPage ==$pageCount){

        //     $total=$totalAll-1;

        }else{
            $total=0;
        }

    

        $showStart=$total;
        $end=$getperPage;

        if( $currentPage !=$pageCount){

            $end=$total+$getperPage;
        }else{
            $end=$totalAll;
        }

       $show= "Showing " .++$showStart." to $end of $totalAll results";

       $d['show']=$show;
       $d['count']=$total;

        return $d;

    }

    public static function getCourseAll(){

        $model= new CourseModel();
        $data= $model->asObject()->findAll();

        foreach($data as $row){
            $d[$row->id]=$row->course_name;
        }
  

        return $d;
    }

    public static function getState(){

       
        $state= ['MELAKA' => 'MELAKA',
        'JOHOR' => 'JOHOR',
        'NEGERI SEMBILAN' => 'NEGERI SEMBILAN',
        'PAHANG' => 'PAHANG'];

        return $state;
    }

    public static function getGender(){

       
        $gender= ['lelaki' => 'Lelaki',
        'perempuan' => 'Perempuan'];

        return $gender;
    }

}
