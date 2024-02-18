<?php
class HomeModel extends Model
{
    function tableFill()
    {
        return "users";
    }
    function fieldFill()
    {
        return "*";
    }
    function primaryKey()
    {
        return "id";
    }
}
