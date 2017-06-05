<?php

/**
 * @access public
 * @package Model
 */

class Device extends Model
{

    protected $fillable=["categoryid","brandid","model","price"];

    protected $id;

    /**
     * @AssociationType Model.Category
     * @AssociationMultiplicity 1
     * @AssociationKind Aggregation
     */
    public $categoryid;
    public $categoryname;

    /**
     * @AssociationType Model.Brand
     * @AssociationMultiplicity 1
     * @AssociationKind Aggregation
     */
    public $brandid;
    public $brandname;

    public $model;
    public $price;

    /**
     * @AssociationType Model.Reviews
     * @AssociationMultiplicity 0..*
     * @AssociationKind Aggregation
     */
    public $reviews = array();

    function addReview(Review $review)
    {
        $this->reviews[] = $review;
    }

}