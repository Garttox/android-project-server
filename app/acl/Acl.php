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
        $this->addResource('Admin');
        // privileges
        $this->allow(Permission::ALL, 'Homepage', Permission::ALL);
        $this->allow('admin', 'List', Permission::ALL);
        $this->allow('editor', 'List', 'default');
        $this->allow('editor', 'List', 'addTour');
        $this->allow('admin', 'Sign', Permission::ALL);
        $this->allow('editor', 'Sign', 'in');
        $this->allow('guest', 'Sign', 'in');
        $this->allow('admin', 'Admin', Permission::ALL);
        $this->allow('editor', 'Admin', 'default');

    }
}