<?php
class Request
{
    private $__rules = [], $__messages = [], $__errors = [];
    public $db;

    public function __construct()
    {
        $this->db = new Database();
    }
    public function getMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
    public function isPost()
    {
        if ($this->getMethod() == 'post') {
            return true;
        }
        return false;
    }
    public function isGet()
    {
        if ($this->getMethod() == 'get') {
            return true;
        }
        return false;
    }

    public function getFields()
    {
        $data = [];
        if ($this->isGet()) {
            // xu li lay du lieu vs phuong thuc get
            if (!empty($_GET)) {
                foreach ($_GET as $fieldName => $ruleItem) {
                    if (is_array($ruleItem)) {
                        $data[$fieldName] = filter_input(INPUT_GET, $fieldName, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
                    } else {
                        $data[$fieldName] = filter_input(INPUT_GET, $fieldName, FILTER_SANITIZE_SPECIAL_CHARS);
                    }
                }
            }
        }
        if ($this->isPost()) {
            // xu li lay du lieu vs phuong thuc post
            if (!empty($_POST)) {
                foreach ($_POST as $fieldName => $ruleItem) {
                    if (is_array($ruleItem)) {
                        $data[$fieldName] = filter_input(INPUT_POST, $fieldName, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
                    } else {
                        $data[$fieldName] = filter_input(INPUT_POST, $fieldName, FILTER_SANITIZE_SPECIAL_CHARS);
                    }
                }
            }
        }
        return $data;
    }
    // set rules
    public function rules($rules =  [])
    {
        $this->__rules = $rules;
    }
    // set message
    public function messages($messages = [])
    {
        $this->__messages = $messages;
    }
    // run validate
    public function validate()
    {
        $this->__rules = array_filter($this->__rules);
        $check = true;
        if (!empty($this->__rules)) {
            $dataFields = $this->getFields();
            foreach ($this->__rules as $fieldName => $ruleItem) {
                $ruleItemArr = explode('|', $ruleItem);
                foreach ($ruleItemArr as $rules) {
                    $ruleName = null;
                    $ruleValue = null;
                    $rulesArr = explode(':', $rules);

                    $ruleName = reset($rulesArr);
                    if (count($rulesArr) > 1) {
                        $ruleValue = end($rulesArr);
                    }

                    if ($ruleName == "required") {
                        if (empty(trim($dataFields[$fieldName]))) {
                            $this->setErrors($fieldName, $ruleName);
                            $check = false;
                        }
                    }

                    if ($ruleName == "min") {
                        if (strlen(trim($dataFields[$fieldName])) < $ruleValue) {
                            $this->setErrors($fieldName, $ruleName);
                            $check = false;
                        }
                    }
                    if ($ruleName == "max") {
                        if (strlen(trim($dataFields[$fieldName])) > $ruleValue) {
                            $this->setErrors($fieldName, $ruleName);
                            $check = false;
                        }
                    }
                    if ($ruleName == "email") {
                        if (!filter_var($dataFields[$fieldName], FILTER_VALIDATE_EMAIL)) {
                            $this->setErrors($fieldName, $ruleName);
                            $check = false;
                        }
                    }
                    if ($ruleName == "match") {
                        if (trim($dataFields[$fieldName]) != trim($dataFields[$ruleValue])) {
                            $this->setErrors($fieldName, $ruleName);
                            $check = false;
                        }
                    }
                    if ($ruleName == 'unique') {
                        $tableName = null;
                        $fieldCheck = null;
                        if (!empty($rulesArr[1])) {
                            $tableName = $rulesArr[1];
                        }
                        if (!empty($rulesArr[2])) {
                            $fieldCheck = $rulesArr[2];
                        }
                        if (!empty($tableName) && !empty($fieldCheck)) {
                            if (count($rulesArr) == 3) {
                                $checkExits = $this->db->query("SELECT $fieldCheck FROM  $tableName  WHERE  $fieldCheck = 'trim($dataFields[$fieldName])'")->rowCount();
                            } elseif (count($rulesArr) == 4) {
                                if (!empty($rulesArr[3]) && preg_match('~.+?\=.+?~is', $rulesArr[3])) {
                                    $conditionWhere = $rulesArr[3];
                                    $conditionWhere = str_replace('=', '<>', $conditionWhere);
                                    $checkExits = $this->db->query("SELECT $fieldCheck FROM  $tableName  WHERE  $fieldCheck = 'trim($dataFields[$fieldName])' AND $conditionWhere")->rowCount();
                                }
                            }
                            if ($checkExits) {
                                $this->setErrors($fieldName, $ruleName);
                                return $check = false;
                            }
                        }
                    }
                    // callback validate
                    if (preg_match("~^callback_(.+)~", $ruleName, $callbackArr)) {
                        // echo "<pre>";
                        // print_r($callbackArr);
                        // echo "</pre>";
                        if (!empty($callbackArr[1])) {
                            $callbackName = $callbackArr[1];
                            $controller = App::$app->getCurrentController();
                            if (method_exists($controller, $callbackName)) {
                                $checkCallback = call_user_func_array([$controller, $callbackName], [trim($dataFields[$fieldName])]);
                                if (!$checkCallback) {
                                    $this->setErrors($fieldName, $ruleName);
                                    return $check = false;
                                }
                            }
                        }
                    }
                }
            }
        }
        return $check;
    }
    // get errors
    public function errors($fieldName = '')
    {
        if (!empty($this->__errors)) {
            if (empty($fieldName)) {
                $errorsArr = [];
                foreach ($this->__errors as $key => $error) {
                    $errorsArr[$key] = reset($error);
                }
                return $errorsArr;
            }
            return reset($this->__errors[$fieldName]);
        }
        return false;
    }
    public function setErrors($fieldName, $ruleName)
    {
        $this->__errors[$fieldName][$ruleName] = $this->__messages[$fieldName . "." . $ruleName];
    }
}
