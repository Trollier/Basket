<?php

class IOC implements ArrayAccess {

    private $container = array();
    private static $_instance = null;

    private function __construct() {
        $this->container["userManager"] = new UserManager();
        $this->container["userController"] = new UserController($this->container["userManager"]);
        
        $this->container["playerManager"] = new PlayerManager ();
        $this->container["playerController"] = new PlayerController($this->container["playerManager"]);
        
        $this->container["staffManager"] = new StaffManager ();
        $this->container["staffController"] = new StaffController($this->container["staffManager"]);
        
        $this->container["roleTypeManager"] = new RoleTypeManager ();
        $this->container["roleTypeController"] = new RoleTypeController($this->container["roleTypeManager"]);
        
        $this->container["typesMatchManager"] = new TypesMatchManager ();
        $this->container["typesMatchController"] = new TypesMatchController($this->container["typesMatchManager"]);
        
        $this->container["daysOfWeekManager"] = new DaysOfWeekManager ();
        $this->container["daysOfWeekController"] = new DaysOfWeekController($this->container["daysOfWeekManager"]);
        
        $this->container["staffsRoleTypeManager"] = new StaffsRoleTypesManager($this->container["staffManager"], $this->container["roleTypeManager"]);
        $this->container["staffsRoleTypeController"] = new StaffsRoleTypeController($this->container["staffsRoleTypeManager"]);
        
        $this->container["roleManager"] = new RoleManager($this->container["userManager"], $this->container["roleTypeManager"]);
        $this->container["roleController"] = new RoleController($this->container["roleManager"]);
        
        $this->container["teamsManager"] = new TeamsManager($this->container["playerManager"]);
        $this->container["teamsController"] = new TeamsController($this->container["teamsManager"]);
    }

    public static function getInstance() {
        if (is_null(self::$_instance)) {
            self::$_instance = new IOC();
        }
        return self::$_instance;
    }

    public function offsetExists($offset) {
        return array_key_exists($offset, $this->container);
    }

    public function offsetGet($offset) {
        return $this->container[$offset];
    }

    public function offsetSet($offset, $value) {
        $this->container[$offset] = $value;
    }

    public function offsetUnset($offset) {
        unset($this->container[$offset]);
    }

}
