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

        $this->container["teamsRankingManager"] = new TeamsRankingManager($this->container["teamsManager"]);
        $this->container["teamsRankingController"] = new TeamsRankingController($this->container["teamsRankingManager"]);


        $this->container["teamsCoachManager"] = new TeamsCoachManager($this->container["userManager"], $this->container["teamsManager"]);
        $this->container["teamsCoachController"] = new TeamsCoachController($this->container["teamsCoachManager"]);
        
        $this->container["teamsDelegueManager"] = new TeamsDelegueManager($this->container["userManager"], $this->container["teamsManager"]);
        $this->container["teamsDelegueController"] = new TeamsDelegueController($this->container["teamsDelegueManager"]);
        
        $this->container["teamsPlayerManager"] = new TeamsPlayersManager($this->container["playerManager"], $this->container["teamsManager"]);
        $this->container["teamsPlayerController"] = new TeamsPlayersController($this->container["teamsPlayerManager"]);
        
        $this->container["teamsGamesManager"] = new TeamsGamesManager($this->container["daysOfWeekManager"], $this->container["teamsManager"]);
        $this->container["teamsGamesController"] = new TeamsGamesController($this->container["teamsGamesManager"]);
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
