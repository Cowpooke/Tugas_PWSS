<?php
    error_reporting(E_ALL ^ E_DEPRECATED);
    $host = "localhost";
    $user = "root";
    $pass = "";
    $dbName = "pharmacy_db";

    $con = @mysqli_connect($host,$user,$pass,$dbName);
    if (!$con)
        die ("fail to connect");

    //---------------------Employee Table-----------------------------
    $sqlTableEmployee = "create table if not exists employee (
                        employee_id int(5) auto_increment not null,
                        name varchar(40) not null,
                        address varchar(40) not null,
                        roles varchar(20) not null,
                        PRIMARY KEY (employee_id)
                        )";
    mysqli_query($con,$sqlTableEmployee) or die("can't create table");

    //-------------------------Stock----------------------------------
    $sqlTableStock = "create table if not exists stock (
                     drug_id int(10) auto_increment not null,
                     stock float not null,
                     date_modified datetime not null,
                     PRIMARY KEY (drug_id)
     )";
    mysqli_query($con,$sqlTableStock) or die("can't create table");
    //-------------------------Drug-----------------------------------
    $sqlTableDrug = "create table if not exists drug (
                    drug_id varchar(10) not null,
                    price float not null,
                    name varchar(40) not null,
                    PRIMARY KEY (drug_id)
     )";
    mysqli_query($con,$sqlTableDrug) or die("can't create table");
    //-----------------------Sales DetaiL-------------------------------
    $sqlTableSale_D = "create table if not exists sales_detail (
                      id_sales int(11) auto_increment not null,
                      drug_id int(10) not null,
                      quantities float not null,
                      subtotal float not null, 
                      date_modified datetime not null,
                      PRIMARY KEY (id_sales)
     )";
    mysqli_query($con,$sqlTableSale_D) or die("can't create table");
    //--------------------------Sales----------------------------------
    $sqlTableSelling = "create table if not exists sales (
                       id_sales int(11) auto_increment not null,
                       customer_id int(10) not null,
                       name varchar(40) not null,
                       sale_date datetime not null,
                       total float not null,
                       PRIMARY KEY (id_sales)

     )";
    mysqli_query($con,$sqlTableSelling) or die("can't create table");
    //---------------------------Customer------------------------------
    $sqlTableBuyer = "create table if not exists customer (
                     customer_id int(10) auto_increment not null,
                     name varchar(40) not null,
                     phone varchar(30) not null,
                     PRIMARY KEY (customer_id)
     )";
    mysqli_query($con,$sqlTableBuyer) or die("can't create table");
    //------------------------------Roles------------------------------
    $sqlTableUsr = "create table if not exists users (
                    id int(11) NOT NULL AUTO_INCREMENT,
                    username varchar(255) NOT NULL,
                    password varchar(255) NOT NULL,
                    PRIMARY KEY(id)
    )";
?>