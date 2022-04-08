<?php
require_once "../../config/Database.php";
class QueryBuilder {

    public static function select($tbl, $cols = [], $condition = '', $limit = '') {
        
        $output = "SELECT ";
        
        // composing columns
        if (is_array($cols) && count($cols) != 0) {
                $output .= (count($cols) > 1)? "`" . implode('`, `', $cols) . "` " : " `$cols[0]` ";
        } else {
            $output .= "* ";
        }
        
        // From Clause
        $output .= "FROM `$tbl`";

        // Condition Clause if passed
        if ($condition != '') {
            $output .= " $condition";
        }

        // Limit Clause if passed
        if( !empty( $limit ) ){
            $output .= " LIMIT " . $limit;
        }

        // return final constructed query
        return $output;
    }

    public static function insert($tbl, $data) {
        // constructing the query list of columns
        $cols = "`" . implode("`, `", array_keys($data)) . "`";
        // constructing the query list of values according to columns and cleaning data for sql injection prevention
        $vals = "'" . implode("', '", array_map("self::escape_data_string", array_values($data))) . "'";
        return "INSERT INTO `$tbl` ($cols) VALUES ($vals)";
    }

    public static function update($tbl, $data, $condition) {
        $output = "UPDATE `$tbl` SET ";
        $counter = 0;
        // list of columns and values to be updated
        foreach ($data as $col => $val) {
            $output .= "`$col` = ";
            if( $data[$col] == "" ):
                $output .= "NULL";
            else:
                $output .= "'" . self::escape_data_string($val) . "'";
            endif;
            if ($counter < count($data) - 1) { // if is the last update data
                $output .= ", ";
            }
            $counter++;
        }
        // condition if specified
        if ($condition != '') {
            $output .= " WHERE $condition";
        }
        return $output;
    }

    // delete query
    public static function delete($tbl, $condition) {
        return "DELETE FROM `$tbl` WHERE $condition";
    }

    // escape data string function is for SQL Injection prevention, leveraging the Database class escape_data function
    public static function escape_data_string($data)
    {
        $db = new Database;
        return $db->escape_data($data);
    } 

}
