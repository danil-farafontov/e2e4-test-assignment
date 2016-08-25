<?php
    abstract class Table extends Database
    {
        protected $table_name;
        protected $object_name;
        
        public function __construct() 
        {
            $this->table_name = strtolower(preg_replace("/Table/", "", get_class($this)));
            $this->object_name = rtrim(preg_replace("/Table/", "", get_class($this)), "s");
            parent::__construct();
        }
        
        private function ProcessResult($result) 
        {
            if (isset($result) && !empty($result))
            {
                $objects = [];
                foreach($result as $row)
                {
                    $object = new $this->object_name($row);
                    array_push($objects, $object);
                }
                return $objects;
            }
            return [];
        }
        
        public function Count()
        {
            $result = parent::CountRows($this->table_name);
            return $result[0][0];
        }
        
        /** Retrieves requested items from database  
         * @param string $selection     string of requested parts of object ("id, header, ...)"
         * @param string $where_clause  specific selection ("id=5, ...")
         * @param string $order_by      order by selected part of object ("id, ...")
         * @param string $type_of_order asceding or descending order ("ASC" or "DESC")
         * @return object return requested object(s) from database
         */
        public function Select(
                $selection,
                $where_clause = NULL,
                $order_by = NULL,
                $type_of_order = NULL)
        {
            $result =  parent::SelectRows(
                    $this->table_name,
                    $selection,
                    $where_clause,
                    $order_by,
                    $type_of_order);
            return $this->ProcessResult($result);
        }
        
        public function Get($id = null)
        {
            if (isset($id))
            {
                return $this->Select("*", "id='$id'", 'id', 'DESC')[0];
            }
            else
            {
                return $this->Select("*", null, 'id', 'DESC');
            }
        }
        
        public function Insert($object)
        {
            $columns = [];
            $values = [];
            foreach ($object as $property => $value)
            {
                if (isset($value))
                {
                    array_push($columns, $property);
                    array_push($values, $value);
                }
            }
            $columns = join(", ", $columns);
            $values = "'" . join("', '", $values) . "'";
            return parent::InsertRows(
                    $this->table_name,
                    $columns,
                    $values);
        }
        
        public function Delete($id)
        {
            return parent::DeleteRows($this->table_name, "id='{$id}'");
        }
        
        public function Update($id, $data)
        {
            $set = [];
            foreach ($data as $property => $value)
            {
                if (isset($value))
                {
                    array_push($set, "$property='$value'");
                }
            }
            $set = join(", ", $set);
            $where = "id='$id'";
            return parent::UpdateRows($this->table_name, $set, $where);
        }
    }
?>