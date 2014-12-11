<?php

/**
 * Description of Form
 *
 * @author Brahim
 */
class Form {

    private $action;
    private $method;

    public function __construct($action, $method) {
        $this->action = $action;
        $this->method = $method;
    }

    public function text($id, $label = null, $value = null) {
        return $this->input("text", $id, $label, $value);
    }

    public function hidden($id, $label = null, $value = null) {
        return $this->input("hidden", $id, $label, $value);
    }

    public function date($id, $label = null, $value = null) {
        return $this->input("date", $id, $label, $value);
    }

    public function number($id, $label = null, $value = null) {
        return $this->input("number", $id, $label, $value);
    }

    public function email($id, $label = null, $value = null) {
        return $this->input("email", $id, $label, $value);
    }

    public function submit($value = null) {
        $value = $value ? $value : "Envoyer";
        return "<input type='submit' value='$value' class='btn btn-primary' >";
    }

    public function password($id, $label = null, $value = null) {
        return $this->input("password", $id, $label, $value);
    }

    public function input($type, $id, $label = null, $value = null) {
        $input = '<div class="form-group">';
        if (isset($label)) {
            $input.="<label for='$id'>$label</label>";
        }
        $value = $value ? $value : "";
        $input.="<input type='$type' name='$id' id='$id' class='form-control' value='$value' />";
        $input.="</div>";
        return $input;
    }

    public function select($id, $label = null, array $options, $value = null) {
        $input = '<div class="form-group">';
        if (isset($label)) {
            $input.="<label for='$id'>$label</label>";
            $input.= "<select id='$id' name='$id' class='form-control'>";
            foreach ($options as  $option) {
                $input.="<option value='$option'" . ($value === $option ? " selected='true' " : "") . ">$option</option>";
            }
            $input.="</select></div>";
            return $input;
        }
        /**
         * <select class="form-control">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
          </select>
         */
    }

    public function textarea() {
        // to do
    }

    public function openForm() {
        return "<form action='$this->action' method='$this->method'>";
    }

    public function closeForm() {
        return "</form>";
    }

}
