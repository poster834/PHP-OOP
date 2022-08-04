<?php
namespace MyProject\Controllers;
use MyProject\View\View;
use MyProject\Models\Users\User;
use MyProject\Exceptions\InvalidArgumentException;
use MyProject\Exceptions\InvalidUserId;
use MyProject\Models\Users\EmailSender;
use MyProject\Models\Users\UserActivationService;
use MyProject\Models\Users\UsersAuthService;


class UsersController extends AbstractController
{

    public function signUp(): void
    {
        if (!empty($_POST)) {
            try {
                $user = User::signUp($_POST);
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('users/signUp.php', ['error'=>$e->getMessage()]);
                return;
            }

            if ($user instanceof User) {
                $code = UserActivationService::createActivationCode($user);

                EmailSender::send($user,'Активация','userActivation.php',
                [
                    'user_id'=>$user->getId(),
                    'code'=>$code,
                ]
            );

                $this->view->renderHtml('users/signUpSuccess.php');
                return;
            }
            
        }
        $this->view->renderHtml('users/signUp.php',[]);
    }

    public function activate(int $userId, string $activationCode):void
    {
        try { 
            $user = User::getById($userId);

            if ($user === null) {
                throw new InvalidUserId('Пользователь с таким ID не найден в базе данных.');
            }
            if ($user->getConfirmed() == 1) {
                throw new InvalidUserId ('Пользователь уже активирован.');
            }

            $isCodeValid = UserActivationService::checkActivationCode($user, $activationCode);      

            if ($isCodeValid) {
                    $user->activate();                 
                    UserActivationService::deleteActivationCode($activationCode);  
                    $this->view->renderHtml('users/activateUser.php');
            } else {
                throw new InvalidUserId('Код активации просрочен');
            }
            
        } catch (InvalidUserId $e) {
            $this->view->renderHtml('users/activateUser.php',['error'=>$e->getMessage()]);
            return;
        }        
    }

    public function login() : void
    {
        if (!empty($_POST)) {
            try{
                $user = User::login($_POST);
                UsersAuthService::createToken($user);
                header ('Location: /www');
                exit();
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('users/login.php',['error'=>$e->getMessage()]);
            }
        } else {
            $this->view->renderHtml('users/login.php',[]);
        }
    }

    public function logout():?User
    {
        $user = UsersAuthService::getUserByToken();
        UsersAuthService::deleteToken();
        header ('Location: /www');
        exit();
        return $user;
    }
}