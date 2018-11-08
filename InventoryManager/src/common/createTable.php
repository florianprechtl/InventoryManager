<?php
    include('../connectDB.php');

echo '<span> creation de table people </span>'
    
CREATE TABLE People (
    PersonID int,
    LastName varchar(255),
    FirstName varchar(255),
    Address varchar(255),
    City varchar(255) 
);
/*
CREATE TABLE tablename (
    column1 datatype,
    column2 datatype,
    column3 datatype,
   ....
);*/

?>
