<?php
class ProductModel extends Model
{
    function tableFill()
    {
        return "products";
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
