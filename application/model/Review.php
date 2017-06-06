<?php
/**
 * @access public
 * @package Model
 */

/**
 * Created by PhpStorm.
 * User: daniel687
 * Date: 5/12/17
 * Time: 11:13 AM
 */
class Review extends Model
{

    protected $fillable=["title","deviceid","description","vote","userid"];

    protected $id;
    public $deviceid;
    public $title;
    public $description;
    public $vote;
    public $userid;

}