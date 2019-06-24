<?php

class AutoShop 
{
    private $autoCatalog;
    private $con;
    public function __construct()
    {
        $db = new db;
        $this->con = $db->getConnection();
        
    }
    function show()
    {
        print_r($this->autoCatalog);
    }

    function allAuto()
    {
        $resultArray = array();

        foreach($this->con->query('SELECT Cars.id, CarsModel.name, model 
        from Cars,CarsModel 
        where id_name = CarsModel.id') as $row) {
            $tmp_arr = array('id'=>$row['id'],'model'=>$row['model'],'name'=>$row['name']);
            array_push($resultArray, $tmp_arr); 
        }
       
        return $resultArray;
    }

    function oneAuto($id)
    {
        $resultArray = array();
       
        $stmt = $this->con->prepare("SELECT Cars.id, CarsModel.name, model , year , engin , color, max_speed, price
        FROM Cars,CarsModel WHERE id_name = CarsModel.id  
        AND Cars.id = ?");
        $stmt->execute([$id]); 
        $row = $stmt->fetch();

            $tmp_arr = array(
            'id'=>$row['id'],    
            'modelName'=>$row['name'].":".$row['model'],
            'year'=>$row['year'],
            'engine'=>$row['engin'],
            'color'=>$row['color'],
            'maxspeed'=>$row['max_speed'],
            'price'=>$row['price']);
            array_push($resultArray, $tmp_arr); 
        
        return $resultArray;
    }

    function searchAuto($searchParam, $val, $year)
    {

        $resultArray = array();
        
        $que = 'SELECT Cars.id, CarsModel.name, model , year , engin , color, max_speed, price 
        from Cars,CarsModel 
        where '.$searchParam.' = "'.$val.'" AND id_name = CarsModel.id AND year = '.$year;
        
        
        $stmt = $this->con->prepare($que);
        // print_r($stmt);
        $stmt->execute();
        $res = $stmt->fetchAll();
        foreach($res as $row) {
            $tmp_arr = array(
                'id'=>$row['id'],    
                'modelName'=>$row['name'].":".$row['model'],
                'year'=>$row['year'],
                'engine'=>$row['engin'],
                'color'=>$row['color'],
                'maxspeed'=>$row['max_speed'],
                'price'=>$row['price']);
                array_push($resultArray, $tmp_arr); 
        }
       
        return $resultArray;
      
    }
    function bueAuto($idAuto,$fname, $lname, $order){
        $sql = "INSERT INTO CarsOrders (id_car, first_name, last_name , orders) VALUES (?,?,?,?)";
        $stmt = $this->con->prepare($sql);
        if( $stmt->execute([$idAuto,$fname, $lname, $order])){
            return array('ok');
        }else{
            return array('error server');
        }
    }

}