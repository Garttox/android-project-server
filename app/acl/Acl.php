<?php

namespace App\Acl;

use Nette\Security\Permission;

class Acl extends Permission {

    public function __construct() {
        //roles
        $this->addRole('guest');
        $this->addRole('editor');
        $this->addRole('admin');
        // resources
        $this->addResource('Homepage');
        $this->addResource('Sign');
        $this->addResource('List');
        // privileges
        $this->allow(Permission::ALL, 'Homepage', Permission::ALL);
        $this->allow(Permission::ALL, 'List', Permission::ALL);
       
        $this->deny('guest', 'List', ['default','add']);
        $this->deny('editor', 'List', 'add');
    }
}