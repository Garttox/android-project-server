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
        $this->allow('admin', 'List', Permission::ALL);
        $this->allow('editor', 'List', 'default');
        $this->allow('admin', 'Sign', 'up');
        
    }
}