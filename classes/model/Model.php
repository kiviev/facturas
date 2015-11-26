<?php
/**
 * Created by PhpStorm.
 * User: student
 * Date: 26/11/2015
 * Time: 12:05
 */

namespace classes\model;


class Model {



    static  function create_table(array $arr ,$columns=array() ,$alias=array())
    {
        $table= '<table class="table table-bordered table-hover">';
        $table.= '<tr class="info">';
        if( count($alias)!==0 && count($columns)!==0 ){
            for($i=0 ;$i<count($alias);$i++){
                $table.='<th>'.$alias[$i].'</th>';
            }
        }else {echo 'ERROR no alias or columns defined in Model::create_table';}
        if( count($columns)!==0){
            if( count($columns) == count($columns)){
                foreach($arr as $row){
                    $table.='<tr>';
                    for($i=0 ;$i<count($alias);$i++){
                        $table.='<td>'.$row->$columns[$i].'</td>';
                    }
                    $table.='</tr>';
                }
                $table.='</tr>';
                $table.='</table>';
            }
        }

        echo $table;
    }

//    static  function create_table(array $arr  ,$alias=array())
//    {
//        $table= '<table class="table table-bordered table-hover">';
//        $table.= '<tr class="info">';
//        if(count($alias)!==0){
//            for($i=0 ;$i<count($alias);$i++){
//                $table.='<th>'.$alias[$i].'</th>';
//            }
//        }else{
//            foreach($arr as $row){
//                $count=0;
//                foreach($row as $key => $value){
//                    $table.= ' <th>'.$key.'</th>';
//                    if($count > count($row)){
//                        break;
//                    }
//                    $count++;
//                }
//                break;
//            }
//        }
//        foreach($arr as $row){
//            $table.='<tr>';
//            foreach($row as $key => $value){
//                $table.= ' <td>'.$value.'</td>';
//            }
//            $table.='</tr>';
//        }
//        $table.='</tr>';
//        $table.='</table>';
//        echo $table;
//    }
} 