<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UpdateStartDate
 *
 * @author Michał
 */
class UpdateStartDate {
    public function __construct($param) {
        require_once("DateBase.php");
        
        $date = date("Y-m-d");
        $insert_user = "UPDATE plants_pets SET start_date='".$date."' WHERE id = '".$param."'";
        $add_to_database = new DateBase($insert_user);
    }
}
