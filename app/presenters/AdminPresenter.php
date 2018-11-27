<?php

namespace App\Presenters;


class AdminPresenter extends BasePresenter
{
	public function renderDefault()
	{
        if ($this->getUser()->isAllowed()){
            $this->redirect("Sign:up");
        }
        else $this->redirect("Sign:in");
    }
}
