<?php

class My_Model
{

    protected $table_name;
    protected $fields = array();
    protected $primary_key;
    protected $meta_key;
    public    $meta_key_value;

    protected function get_columns()
    {
        $sql = array();
        foreach ($this->fields as $column) {
            $sql[] = "{$column}='{$this->$column}'";
        }
        return implode(',', $sql);
    }

    protected function get_columns_array()
    {
        $sql = array();
        foreach ($this->fields as $column) {
            $sql[$column] = $this->$column;
        }
        return $sql;
    }

    protected function all_data($additionWere)
    {
        global $mansDb;
        $reslut = $mansDb->query("select * from " . $this->table_name. " $additionWere");
        while ($row = mysqli_fetch_assoc($reslut)) {
            $data[] = $row;
        }
        return $data;
    }


    protected function editMetaKey($additionWere)
    {


        global $mansDb;

        $meta_key = $this->meta_key;

//
//        var_dump("update " . $this->table_name . " set " . $this->get_columns() . " where {$this->meta_key}='{$this->meta_key_value}' $additionWere");
//        die();
        // $primary_key="product_id";
//        echo "update " . $this->table_name . " set " . $this->get_columns() . " where {$this->primary_key}={$this->$primary_key}";
        return $mansDb->query("update " . $this->table_name . " set " . $this->get_columns() . " where {$this->meta_key}='{$this->meta_key_value}' $additionWere");
    }

}
