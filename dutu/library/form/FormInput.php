<?php

/**
 * The FormInput class.  
 *
 * PHP Version 5
 *
 * LICENSE: This source file is licensed under a Creative Commons Attribution-Share Alike 3.0 United States License. http://creativecommons.org/licenses/by-sa/3.0/us/
 *
 * @category    Form Input
 * @author      Sean Monahan
 * @copyright   2008 Sean Monahan
 * @version     1.0
 */
require_once "FormField.php";

class FormInput extends FormField {

    /**
     * The type of field.  Defaults to "text".
     * Can be "text", "hidden", "button", and "submit".
     *
     * @var string
     */
    private $type = "text";

    /**
     * The value assigned to the field.
     *
     * @var string
     */
    private $value = "";

    /**
     * The image to replace a form element.
     *
     * @var string
     */
    private $image = "";

    /**
     * The value for the "checked" attribute.  Applies only
     * to types "radio" and "checkbox".
     *
     * @var bool
     */
    private $checked = false;

    /**
     * The list of acceptable mime-types.  Applies only
     * to type "file".
     *
     * @var string
     */
    private $accept = "";

    /**
     * The maximum length for the field.  Applies only to 
     * type "text" and "password".  Default: -1 (no max).
     *
     * @var int
     */
    private $maxLength = -1;

    /**
     * Prevents the field from being modified.  Applies only to
     * type "text" and "password".
     *
     * @var bool
     */
    private $readOnly = false;

    /**
     * Adds style padding to the field.
     * 
     * And what might this be used for?  Well, if you ever get bored of rectangular
     * form fields you might want to do something like add rounded edges ala Mac OS X.
     * Enabling style padding adds some HTML markup around your form field that can then be
     * styled with CSS to give you fancy, vanilla-free form field.
     *
     * @var bool
     */
    private $stylePad = false;

    /**
     * This class builds an HTML <input>.
     *
     * @param string $value The value for the <input>.
     * @param string $type The type for the <input>.
     * @param string $name The name for the <input>.
     * @param string $label The label for the <input>.
     * @param string $className The CSS class for the <input>.
     * @param string $image The image to use for the <input>.
     * @param bool $stylePad Add <div>'s so the <input> can be styled with fancy
     *                  rounded edges and such.
     */
    public function __construct($value = "", $type = "text", $name = "", $label = "", $className = "", $image = null, $stylePad = false) {
        $this->setFieldType("input");
        $this->setValue($value);
        $this->setName($name);
        $this->setLabel($label);
        $this->setType($type);
        $this->setClassName($className);
        if (!is_null($image)) {
            $this->setImage($image);
        }
        $this->setStylePad($stylePad);
    }

    /**
     * Getter for $type.
     *
     * @return string The type of input.
     */
    public function type() {
        return $this->type;
    }

    /**
     * Getter for  $value.
     *
     * @return string The value of the input.
     */
    public function value() {
        return $this->value;
    }

    /**
     * Getter for $checked.
     *
     * @return bool Whether the input is checked or not.
     */
    public function checked() {
        return $this->checked;
    }

    /**
     * Getter for $accept.
     *
     * @return string The list of acceptable mime-types.
     */
    public function accept() {
        return $this->accept;
    }

    /**
     * Getter for $maxLength.
     *
     * @return string The maximum length allowed for the input.
     */
    public function maxLength() {
        return $this->maxLength;
    }

    /**
     * Getter for $readOnly.
     *
     * @return bool Whether the input is read-only or not.
     */
    public function readOnly() {
        return $this->readOnly;
    }

    /**
     * Getter for $image.
     *
     * @return string The path to the image that will be used by the input.
     */
    public function image() {
        return $this->image;
    }

    /**
     * Getter for $stylePad.
     *
     * @return bool Whether style padding is enabled or not.
     */
    public function stylePad() {
        return $this->stylePad;
    }

    /**
     * Setter for $type
     *
     * @param string $type The type for the input field.
     *                     Only "text", "hidden", "button" and "submit"
     *                     are allowed.
     */
    public function setType($type) {
        $type = strtolower($type);
        $types = array("button", "checkbox", "file", "hidden", "image", "password",
            "radio", "reset", "submit", "text");
        if (!in_array($type, $types)) {
            throw new Exception("Invalid type.");
        }
        $this->type = $type;
    }

    /**
     * Setter for $value;
     * 
     * @param string $value The contents for $value.
     */
    public function setValue($value) {
        $this->value = $value;
    }

    /**
     * Setter for $checked.
     *
     * @param string $value Set the radio or check box to be selected.
     */
    public function setChecked($value) {
        if ($this->type != "radio" && $this->type != "checkbox") {
            throw new Exception("The field must be type 'radio' or 'checkbox' to set this value.");
        }
        $this->checked = $value;
    }

    /**
     * Setter for $accept.
     *
     * @param string $value The list of allowed mime-types.
     */
    public function setAccept($value) {
        if ($this->type != "file") {
            throw new Exception("The field type must be 'file' to set this value.");
        }
        $this->accept = $value;
    }

    /**
     * Setter for $maxLength.
     *
     * @param int $value The length allowed for the input field.
     */
    public function setMaxLength($value) {
        if (!is_int($value)) {
            throw new Exception("Value must be an integer.");
            return $message;
        }
        if ($this->type != "text" && $this->type != "password") {
            throw new Exception("The field type must be 'text' or 'password' to set this value.");
        }
        $this->maxLength = $value;
    }

    /**
     * Setter for $readOnly.
     *
     * @param bool $value True to set the field to read only.
     */
    public function setReadOnly($value) {
        if (!is_bool($value)) {
            throw new Exception("Value must be boolean.");
        }
        $this->readOnly = $value;
    }

    /**
     * Setter for $_size.
     *
     * @param int $value The size.
     */
    public function setSize($value) {
        if (!is_int($value)) {
            throw new Exception("Value must be an integer.");
        }
        if ($this->type == "hidden") {
            throw new Exception("This attribute cannot be used with the type 'hidden'.");
        }
        $this->_size = $value;
    }

    /**
     * Setter for $image.
     *
     * @param string $image The path to the image.
     */
    public function setImage($value) {
        if ($this->type != "image") {
            throw new Exception("This attribute can only be used with type 'image'.");
        }
        $this->image = $value;
    }

    /**
     * Setter for $stylePad.
     *
     * @param bool $value The value for style pad.
     */
    public function setStylePad($value) {
        if (!is_bool($value)) {
            throw new Exception("Value must be a boolean.");
        }
        $this->stylePad = $value;
    }

    
}

