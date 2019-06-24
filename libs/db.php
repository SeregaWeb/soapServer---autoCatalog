<?php

class db 
{   
    private $connect;
    public $auto = array(
       array('Name'=>'Lada','Model'=>'XRay','Id'=>1,'Year'=>2015,'Engine'=>'2.4','Color'=>'Brown','MaxSpeed'=>220,'Price'=>45000), 
       array('Name'=>'Mazda','Model'=>'6','Id'=>2,'Year'=>2015,'Engine'=>'4.2','Color'=>'Black','MaxSpeed'=>280,'Price'=>48000), 
       array('Name'=>'BMW','Model'=>'Z4','Id'=>3,'Year'=>2017,'Engine'=>'3.5','Color'=>'Red','MaxSpeed'=>240,'Price'=>50000)
    );

    public function getAuto()
    {
        
        return $this->auto;
        
    }

    public function getConnection()
    {
        $this->connect = new PDO('mysql:host=localhost;dbname=user7', 'user7', 'user7');

        return $this->connect;
    }
    // CREATE TABLE Cars (
    //     id int primary key auto_increment,
    //     id_name int not null,
    //     model varchar(100) not null,
    //     year int not null,
    //     engin float not null,
    //     color varchar (100) not null,
    //     max_speed int not null,
    //     price float not null ,
    //     FOREIGN KEY (id_name) REFERENCES CarsModel(id)
    // );
    // CREATE TABLE CarsModel (
    //     id int primary key auto_increment,
    //     name varchar(100) not null
    // )
    // CREATE TABLE CarsOrders (
    //     id_car int not null,
    //     first_name varchar(100) not null,
    //     last_name varchar(100) not null,
    //     orders ENUM ('cash','card') not null,
    // )
    // INSERT INTO CarsModel (name) 
    // VALUES ('BMW'),('Mazda'),('Reng Rover'),('Audi');

    // INSERT INTO Cars (id_name,model,year,engin,color,max_speed,price) 
    // VALUES (1,'z4',2004,2.5,'red',220,40000),
    // (2,'cx5',2016,3.5,'white',240,49000),
    // (3,'sport',2014,6.5,'black',280,80000),
    // (4,'a8',2019,4.5,'grey',320,70000),
    // (1,'X6',2016,5.5,'black',290,75000);
    
}