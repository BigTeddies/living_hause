<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DateBase
 *
 * @author Michał
 */
class DateBase {
    public function __construct($query) {
        $mysqlConnection = @mysql_connect("localhost", "living_hause", "qr6ZC6brhwdnSv2q") or die(mysql_error());
        mysql_select_db("living_hause") or die(mysql_error());
        mysql_set_charset("utf8");
        mysql_query($query) or die(mysql_error());
        mysql_close($mysqlConnection);
    }
    public function connect() {
        
        
    }
}
