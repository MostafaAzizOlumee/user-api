<?php

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

}
