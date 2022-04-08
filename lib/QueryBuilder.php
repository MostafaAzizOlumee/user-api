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
        $cols = "`" . implode("`, `", array_keys($data)) . "`";
        $vals = "'" . implode("', '", array_map("self::escape_data_string", array_values($data))) . "'";
        return "INSERT INTO `$tbl` ($cols) VALUES ($vals)";
    }

    public static function update($tbl, $data, $condition) {
        $output = "UPDATE `$tbl` SET ";
        $counter = 0;
        foreach ($data as $col => $val) {
            $output .= "`$col` = ";
            if( $data[$col] == "" ):
                $output .= "NULL";
            else:
                $output .= "'" . self::escape_data_string($val) . "'";
            endif;
            if ($counter < count($data) - 1) {
                $output .= ", ";
            }
            $counter++;
        }

        if ($condition != '') {
            $output .= " WHERE $condition";
        }
        return $output;
    }

    public static function escape_data_string($data)
    {
        $db = new Database;
        return $db->escape_data($data);
    } 

}
