<?php
function sanitize($v){
    if(isset($v)){
        switch(gettype($v)){
            case "boolean":
                $data = (bool)$v;
            break;
            case "integer":
                $data  = (int)$v;
            break;
            case "double":
                $data = (double)$v;
            break;
            case "string":
                $data = (string)trim(htmlentities($v,ENT_QUOTES,'UTF-8'));
            break;
            case "array":
                $data = (array)$v;
            break;
            case "object":
                $data  = (object)$v;
            break;
            case "resources":
                $data = false;
            break;
            case "NULL":
                $data = (unset)$v;
            break;
            case "unknown type":
                $data = false;
            break;
        }
    }else {
        $data = false;
    }
    return $data;
}


?>