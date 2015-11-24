<?php namespace classes\DB
/**
 * este requires lo que contiene es varios requires para poder hacer funcionar la clase, en este caso solo las variables que guardan los valores de HOST, USER, PASSWORD, Y DB   por defecto.
 * Lo mejor es guardar este archivo (en mi caso 'config_app.php') guardarlo fuera del alcance de apache, en una ruta por encima del directorio de htdocs para mayor seguridad
 */
/** con este require se piden las variables donde están los datos de conexion como HOST,USER,PASS y DB
 * */
require_once('requires.php');

/**
* 
*/
class Db {

	protected  $host;
	protected  $user;
	protected  $pass;
	protected  $db;
	protected  $conex;
	protected  $query;

    /**
     *Funcion constructora , con ella generamos una instancia de la clase, utiliza el método conexion() para que cuando se cree la instancia, se conecte automáticamente a la base de datos
     */
    public function __construct()
	{
		$this->host = DBHOST;
		$this->user = DBUSER;
		$this->pass = DBPASS;
		$this->db   = DB;
		$this->conex= $this->conexion($this->host , $this->user , $this->pass ,$this->db);
			
//		echo "se ha creado el objeto Db<br>";
	}


    /**
     * @param array $str, array de strings que sirve para darle al select todos los argumentos que queremos buscar
     * @param String $table  le pasamos la tabla sobre la que queremos hacer select
     * @return $this devuelve la propia instancia para poder encadenar métodos
     */
    public function select(Array $str,  $table)
	{

		$from=trim($table);
		$this->query='SELECT '; 
		for ($i=0; $i <count($str) ; $i++) { 
		$str[$i]=trim($str[$i]);
			$this->query .= $str[$i]; 
			if($i+1 <count($str)){
			 	$this->query .= ' , ';
			}
		}
		$this->query .= ' FROM '.$from . ';' ;
//			echo '<br>'.$this->query . ' por select<br>' ;
		return $this;
	}


    /**
     * @param $column Es el nombre de la columna
     * @param $operator Es el simbolo para poder comparar ej (>,<,<=,>=, = ,<>)
     * @param $value Es el valor que buscamos
     * @return $this devuelve la propia instancia para poder encadenar métodos
     */
    public function where($column ,$operator, $value)
	{
		$column =trim($column );
		$operator=trim($operator);
		$value=trim($value);
		$this->query =$this->no_semicolon($this->query);
		$this->query  .= ' WHERE ' .$column  .'  '.$operator.' ' .'"' .$value . '"'.' ;';
//		echo '<br>'.$this->query.' por where<br>';
		return $this;
	}

    /**
     * a la función la he llamado andd() porque and es una palabra reservada
     * @param $column Es el nombre de la columna
     * @param $operator Es el simbolo para poder comparar ej (>,<,<=,>=, = ,<>)
     * @param $value Es el valor que buscamos
     * @return $this devuelve la propia instancia para poder encadenar métodos
     */
    public function andd($column , $operator , $value)
    {
        $column=trim($column);
        $operator=trim($operator);
        $value=trim($value);
        $this->query.= ' AND ' . $column . ' '. $operator .  '"'.$value . '"' ;
//        echo '<br>'.$this->query.' por AND<br>';
        return $this;
    }

    /**
     * @param array $column array con la colección de columnas que queremos insertar
     * @param array $values array con la coleción de valores que queremos insertar a esas columnas (IMPORTANTE: debemos tener cuidado con el orden, los valores se han de introducir en el mismo orden
     * @param $table tabla sobre la que queremos insertar los datos
     * @return $this devuelve la propia instancia para poder encadenar métodos
     */
    public function insert(Array $column , Array $values , $table)
    {
        $table=trim($table);
        $this->query = 'INSERT INTO '.' ' .$table .' ' ;
        if(count($column) != count($values)){
            /**
             * función para gestionar este error
             */
            echo "ERROR el Nº de argumentos de \$column y de \$values debe coincidir";
            exit;
        }else{
            $count= count($column);
            $st_colum='(';
            $st_values='(';
            for($i=0 ; $i <$count; $i++ ){
                $st_colum.= $column[$i];
                $st_values.= '"'.$values[$i].'"';
                if($i+1 < $count){
                    $st_colum .= ', ';
                    $st_values.= ', ';
                }
            }
            $st_colum .=') ';
            $st_values .=') ';
            $this->query .= $st_colum . ' VALUES ' . $st_values.' ;';

        }
//        echo $this->query. ' query por insert';
        return $this;
    }

    /** ATENCIÓN Este método se ha de continuar obligatoriamente con un where, si no actualizaríamos los datos de toda la columna
     * @param $column el nombre de la columna que queremos actualizar
     * @param $operator Es el simbolo para poder comparar ej (>,<,<=,>=, = ,<>)
     * @param $value el valor nuevo que queremos insertar
      * @param $table tabla sobre la que queremos actualizar los datos
     * @return $this devuelve la propia instancia para poder encadenar métodos
     */
    public function update(  $column , $operator , $value ,$table)
    {
        $table=trim($table);
        $column=trim($column);
        $operator=trim($operator);
        $value=trim($value);
        $this->query= "UPDATE ". $table .
            " SET ".$column . " ".$operator ." '" .$value."'";


//        echo '<br>'.$this->query.' por update<br>';
        return $this;


    }

    /** ATENCIÓN Este método se ha de continuar obligatoriamente con un where, si no borrariamos los datos de toda la columna
     * @param $table tabla sobre la que queremos borrar
     * @return $this devuelve la propia instancia para poder encadenar métodos
     */
    public function delete( $table)
    {
        $table=trim($table);
        $this->query= 'DELETE FROM '.$table ;

//        echo $this->query. ' query por delete';
        return $this;
    }

    /**
     * @param $from
     * @param $table2
     * @param $on1
     * @param $on2
     * @param string $type tipo de JOIN (LEFT JOIN, RIGHT JOIN, INNER JOIN), por defecto si no ponemos nada, será INNER JOIN
     * @return $this devuelve la propia instancia para poder encadenar métodos
     */
    public function join($from,$table2, $on1,$on2,$type='INNER JOIN')
	{
		$from=trim($from);
		$table2=trim($table2);
		$on1=trim($on1);
		$on2=trim($on2);
		$type=trim($type);
		$this->query =$this->no_semicolon($this->query);
		$this->query .= ' ' . $type . ' '.$from.' ' . ' ON '. $on1 . ' = ' . $on2 . ';' ;
        //echo '<br>'.$this->query.'  por join<br>';
        return $this;

	}

    /**
     * @param $value este parámetro puede ser un número o un string, es la cantidad de valores que queremos que se nos devuelva
     * @return $this devuelve la propia instancia para poder encadenar métodos
     */
    public function limit($value)
	{
		$value=trim($value);
		$this->query =$this->no_semicolon($this->query);
		$this->query .= ' LIMIT ' .$value.' ;'  ;
		//echo '<br>'.$this->query.'  por limit<br>';
		return $this;
	}


    /** Con este método ejecutamos la query que hemos ido construyendo con las funciones como select(),insert(),update(),delete() andd(), join() .
     * @return bool|mysqli_result|string con select() devuelve los valores selecionados con la query completa
     */
    public function exe()
	{
        $query=$this->query;
        $query=strtolower($query);
        if( (strripos($query, 'update') !==false ) ||
            (strripos($query, 'delete') !==false )
            ){
            if( (strripos($query, 'where')  ) ){

                $conex=$this->conex;
                $resul=$conex->query($this->query);

            }else{
                /**
                 * crear una funcion para gestionar que no esté where
                 * cuando se usa update o delete
                 */
                $resul='ERROR';
                echo '<br> ERROR se ha de utilizar where cuando se utilice UPDATE o DELETE<br>';
            }
        }else{
            $conex=$this->conex;
            $resul=$conex->query($this->query);
        }
//                echo '<br> '.$this->query.'  query a traves de exe';
                return $resul;
    }


    /**
     * @param $query string query completa si queremos pasarsela como un string
     * @return $this devuelve la propia instancia para poder encadenar métodos
     */
    public function query($query)
	{
		$query=trim($query);
		$this->query = $query;
//        echo '<br> '.$this->query.'  query a traves de query()';
		return $this;
	}


    /**
     * @param $str esta es un método auxiliar, sirve para eliminar los semicolon de la query que vamos formando si hiciera falta
     * @return string sin semicolon
     */
    static function no_semicolon($str)
	{
		return str_replace(';', '', $str);
	}

    /**
     * @param $host
     * @param $user
     * @param $pass
     * @param $db
     * @return mysqli
     */
    private function conexion($host,$user,$pass,$db)
	{
		//echo $this->host .' host<br>';
			$conex= new mysqli( $host , $user , $pass ,$db );
			if($conex->connect_error){
			echo "Connection error ($conex->connect_errno) $conex->connect_error \n";
			exit;
			}else{
				//echo "conexion correcta";
			} 
			return $conex;
	}

    /**
     * este método termina con la conexion
     */
    public function close()
	{
		$this->conex->close();
	}
		
	
}






 ?>