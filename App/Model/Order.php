<?php

namespace App\Model;

class Order extends Model{
    private $id;
    private $status;
    private $datetime_purchase;
    private $datetime_confirm;
    private $datetime_shipping;
    private $datetime_delivered;
    private $datetime_cancel;
    private $value;
    private $fk_coupon;
    private $fk_customer;
    private $fk_user_confirm;
    private $fk_address;
    private $shipping_value;
    private $shipping_code;

    public function __construct($object){
        $this->id = !empty($object->id) ? $object->id : null;
        $this->status = $object->status;
        $this->datetime_purchase = !empty($object->datetime_purchase) ? $object->datetime_purchase : null;
        $this->datetime_confirm = !empty($object->datetime_confirm) ? $object->datetime_confirm : null;
        $this->datetime_shipping = !empty($object->datetime_shipping) ? $object->datetime_shipping : null;
        $this->datetime_delivered = !empty($object->datetime_delivered) ? $object->datetime_delivered : null;
        $this->datetime_cancel = !empty($object->datetime_cancel) ? $object->datetime_cancel : null;
        $this->value = $object->value;
        $this->fk_coupon = !empty($object->fk_coupon) ? $object->fk_coupon : null;
        $this->fk_customer = $object->fk_customer;
        $this->fk_user_confirm = !empty($object->fk_user_confirm) ? $object->fk_user_confirm : null;
        $this->fk_address = $object->fk_address;
        $this->shipping_value = $object->shipping_value;
        $this->shipping_code = $object->shipping_code;
    }

    /**
     * Get the value of shipping_code
     */ 
    public function getShipping_code()
    {
        return $this->shipping_code;
    }

    /**
     * Set the value of shipping_code
     *
     * @return  self
     */ 
    public function setShipping_code($shipping_code)
    {
        $this->shipping_code = $shipping_code;

        return $this;
    }

    /**
     * Get the value of shipping_value
     */ 
    public function getShipping_value()
    {
        return $this->shipping_value;
    }

    /**
     * Set the value of shipping_value
     *
     * @return  self
     */ 
    public function setShipping_value($shipping_value)
    {
        $this->shipping_value = $shipping_value;

        return $this;
    }

    /**
     * Get the value of fk_address
     */ 
    public function getFk_address()
    {
        return $this->fk_address;
    }

    /**
     * Set the value of fk_address
     *
     * @return  self
     */ 
    public function setFk_address($fk_address)
    {
        $this->fk_address = $fk_address;

        return $this;
    }

    /**
     * Get the value of fk_user_confirm
     */ 
    public function getFk_user_confirm()
    {
        return $this->fk_user_confirm;
    }

    /**
     * Set the value of fk_user_confirm
     *
     * @return  self
     */ 
    public function setFk_user_confirm($fk_user_confirm)
    {
        $this->fk_user_confirm = $fk_user_confirm;

        return $this;
    }

    /**
     * Get the value of fk_customer
     */ 
    public function getFk_customer()
    {
        return $this->fk_customer;
    }

    /**
     * Set the value of fk_customer
     *
     * @return  self
     */ 
    public function setFk_customer($fk_customer)
    {
        $this->fk_customer = $fk_customer;

        return $this;
    }

    /**
     * Get the value of fk_coupon
     */ 
    public function getFk_coupon()
    {
        return $this->fk_coupon;
    }

    /**
     * Set the value of fk_coupon
     *
     * @return  self
     */ 
    public function setFk_coupon($fk_coupon)
    {
        $this->fk_coupon = $fk_coupon;

        return $this;
    }

    /**
     * Get the value of value
     */ 
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set the value of value
     *
     * @return  self
     */ 
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get the value of datetime_cancel
     */ 
    public function getDatetime_cancel()
    {
        return $this->datetime_cancel;
    }

    /**
     * Set the value of datetime_cancel
     *
     * @return  self
     */ 
    public function setDatetime_cancel($datetime_cancel)
    {
        $this->datetime_cancel = $datetime_cancel;

        return $this;
    }

    /**
     * Get the value of datetime_delivered
     */ 
    public function getDatetime_delivered()
    {
        return $this->datetime_delivered;
    }

    /**
     * Set the value of datetime_delivered
     *
     * @return  self
     */ 
    public function setDatetime_delivered($datetime_delivered)
    {
        $this->datetime_delivered = $datetime_delivered;

        return $this;
    }

    /**
     * Get the value of datetime_shipping
     */ 
    public function getDatetime_shipping()
    {
        return $this->datetime_shipping;
    }

    /**
     * Set the value of datetime_shipping
     *
     * @return  self
     */ 
    public function setDatetime_shipping($datetime_shipping)
    {
        $this->datetime_shipping = $datetime_shipping;

        return $this;
    }

    /**
     * Get the value of datetime_confirm
     */ 
    public function getDatetime_confirm()
    {
        return $this->datetime_confirm;
    }

    /**
     * Set the value of datetime_confirm
     *
     * @return  self
     */ 
    public function setDatetime_confirm($datetime_confirm)
    {
        $this->datetime_confirm = $datetime_confirm;

        return $this;
    }

    /**
     * Get the value of datetime_purchase
     */ 
    public function getDatetime_purchase()
    {
        return $this->datetime_purchase;
    }

    /**
     * Set the value of datetime_purchase
     *
     * @return  self
     */ 
    public function setDatetime_purchase($datetime_purchase)
    {
        $this->datetime_purchase = $datetime_purchase;

        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}