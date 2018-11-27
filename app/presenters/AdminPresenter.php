<?php

namespace App\Presenters;


class AdminPresenter extends BasePresenter
{
	public function renderDefault()
	{
        if ($this->getUser()->isLoggedIn() && $this->getUser()->isInRole('admin')){
            $this->redirect("Sign:up");
        }
        else $this->redirect("Sign:in");
    }
    
    /** @persistent */
	public $backlink = '';
    
        /** @var Forms\SignInFormFactory */
        private $signInFactory;
    
        /** @var Forms\SignUpFormFactory */
        private $signUpFactory;
    
    
        public function __construct(Forms\SignInFormFactory $signInFactory, Forms\SignUpFormFactory $signUpFactory)
        {
            $this->signInFactory = $signInFactory;
            $this->signUpFactory = $signUpFactory;
        }
    
    
        /**
         * Sign-in form factory.
         * @return Form
         */
        protected function createComponentSignInForm()
        {
            return $this->signInFactory->create(function () {
                $this->restoreRequest($this->backlink);
                $this->redirect('Homepage:');
            });
        }
    
    
        /**
         * Sign-up form factory.
         * @return Form
         */
        protected function createComponentSignUpForm()
        {
            return $this->signUpFactory->create(function () {
                $this->redirect('Homepage:');
            });
        }
    
    
        public function actionOut()
        {
            $this->getUser()->logout();
                    $this->redirect('Sign:in');
        }
}
