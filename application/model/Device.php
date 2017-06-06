<?php

/**
 * @access public
 * @package Model
 */

class Device extends Model
{

  /**  Define what columns can be filled during the storage of the Device (Protection for Sql Injection)
  */
  protected $fillable=["categoryid","brandid","model","price"];


    protected $id;
    public $model;
    public $price;


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