<?php 


/**
     * @param mysqli $result  le pasamos el resultado de la consulta de la base de datos.
     * @param array $col_names, array de strings que tiene como valor por defecto un array vacio, si está vacio los nombres de las columnas serán los nombres de las columnas de la base de datos, si queremos darles nombres mas representativos podemos rellenar este campo (ej['nombre','apellido','email'])
     * @return string $table devuelve el string formado que contiene la tabla
     */
    function create_table($result, $col_names=[])
    {
        echo count($col_names).'<br>';
        $table= '';
        $rows=[];
        while($row = $result->fetch_assoc()){
            array_push($rows,$row);
        }

        $table.= '<table>';
        $table.= '<tr>';

        if(count($col_names )!== 0){
            for($i=0 ;$i< count($col_names) ; $i++){
                $table.= ' <th>'.$col_names[$i].'</th>';
            }
        }
          else
        {
            foreach($rows as $row){
                $count=0;
                foreach($row as $key => $value){
                    $table.= ' <th>'.$key.'</th>';
                    if($count > count($row)){
                        break;
                    }
                    $count++;
                }
                break;
            }
        }

        $table.='</tr>';
        foreach($rows as $row){
            $table.='<tr>';
            foreach($row as $key => $value){
                $table.= ' <td>'.$value.'</td>';

            }
            $table.='</tr>';
        }
        $table.= '</table>';
        return $table;
    }

 ?>