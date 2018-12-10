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
        $this->allow('admin',Permission::ALL,Permission::ALL);
        $this->allow(Permission::ALL, 'Homepage', Permission::ALL);
        $this->allow('editor', 'List', 'default');
        $this->allow('editor', 'List', 'addTour');
        $this->allow('editor', 'List', 'editPoint');
        $this->allow('editor', 'List', 'addPoint');
        $this->allow('editor', 'List', 'editTour');
        $this->allow('editor', 'Sign', 'in');
        $this->allow('guest', 'Sign', 'in');
        $this->allow('editor', 'Admin', 'default');

    }
}