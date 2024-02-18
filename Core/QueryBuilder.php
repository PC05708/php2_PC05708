<?php
trait QueryBuilderTrait
{
    public $tableName = "";
    public $where = "";

    public $operator = "";

    public $selectField = "*";
    public $limit = '';
    public $oderBy = '';
    public function table($tableName)
    {
        $this->tableName = $tableName;
        return $this;
    }

    public function where($field, $compare = null, $value = null)
    {
        if (empty($this->where)) {
            $this->operator = " WHERE ";
        } else {
            $this->operator = " AND ";
        }
        $this->where .= "$this->operator $field $compare '$value'";
        return $this;
    }

    public function select($field = "*")
    {
        $this->selectField = $field;
        return $this;
    }
    public function get()
    {
        $sql = "SELECT $this->selectField  FROM $this->tableName $this->where $this->oderBy $this->limit";
        $query = $this->query($sql);

        $this->resetQuery();
        if (!empty($query)) {
            return $query->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    public function first()
    {
        $sql = "SELECT $this->selectField  FROM $this->tableName $this->where  $this->limit";
        $sql = trim($sql);
        $query = $this->query($sql);

        $this->resetQuery();

        if (!empty($query)) {
            return $query->fetch(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }
    public function oderBy($field, $type = 'ASC')
    {
        $fieldArr = array_filter(explode(',', $field));
        if (!empty($fieldArr) && count($fieldArr) >= 2) {
            $this->oderBy = "ODER BY " . implode(', ', $fieldArr);
        } else {
            $this->oderBy = " ORDER BY " . $field . " " . $type;
        }
        return $this;
    }
    public function orWhere($field, $compare = null, $value = null)
    {
        if (empty($this->where)) {
            $this->operator = " WHERE ";
        } else {
            $this->operator = " OR ";
        }
        $this->where .= "$this->operator $field $compare '$value'";
        return $this;
    }
    public function whereLike($field, $value = null)
    {
        if (empty($this->where)) {
            $this->operator = " WHERE ";
        } else {
            $this->operator = " AND ";
        }
        $this->where .= "$this->operator $field LIKE '$value'";
        return $this;
    }
    public function limit($number, $offset = 0)
    {
        $this->limit = " LIMIT $offset, $number";
        return $this;
    }
    public function resetQuery()
    {
        // reset field
        $this->tableName = "";
        $this->where = "";
        $this->operator = "";
        $this->selectField = "*";
        $this->limit = "";
        $this->oderBy = "";
    }
}
