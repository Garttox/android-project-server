<?php

namespace App\Presenters;


class AdminPresenter extends BasePresenter
{
	public function renderDefault()
	{
        if ($this->getUser()->isAllowed('Admin') && $this->getUser()->isAllowed('Sign', 'up') && $this->getUser()->isLoggedIn()) {
            $this->redirect("Sign:up");
        }
        else {
            $this->redirect("Sign:in");
        }
    }
}
