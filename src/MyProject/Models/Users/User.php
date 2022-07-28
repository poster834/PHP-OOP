<?php
namespace MyProject\Models\Users;
use MyProject\Models\ActiveRecordEntity;
use MyProject\Exceptions\InvalidArgumentException;

class User extends ActiveRecordEntity
{
    protected $nickname;
    protected $email;
    protected $is_confirmed;
    protected $role;
    protected $password_hash;
    protected $auth_token;
    protected $created_at;


    public function getNickname():string
    {
        return $this->nickname;
    }

    protected static function getTableName(): string
    {
        return 'users';
    }

    public static function signUp(array $userData): User
    {
        if (empty($userData['nickname'])) {
            throw new InvalidArgumentException('Не передано Имя пользователя');    
        }
        if (!preg_match('~^[a-zA-Z0-9]{3,8}$~',$userData['nickname'])) {
            throw new InvalidArgumentException('Имя пользователя должно быть не менее 3 и не более 8 символов и состоять только из латинских букв с цифр.');
        }
        if (static::findOneByColumn('nickname', $userData['nickname']) !== null) {
            throw new InvalidArgumentException('Пользователь с таким логином уже есть в базе данных.');
        }
        if (empty($userData['email'])) {
            throw new InvalidArgumentException('Не передан E-mail');    
        }
        if (!filter_var($userData['email'], FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException('Не корректный E-mail');    
        }
        if (static::findOneByColumn('email', $userData['email']) !== null) {
            throw new InvalidArgumentException('Пользователь с таким email уже есть в базе данных.');
        }
        if (empty($userData['password'])) {
            throw new InvalidArgumentException('Не передан Пароль');    
        }
        if (strlen($userData['password']) < 8) {
            throw new InvalidArgumentException('Пароль должен быть не менее 8 символов');    
        }

        $user = new User();
        $user->nickname = $userData['nickname'];
        $user->email = $userData['email'];
        $user->password_hash = password_hash($userData['password'], PASSWORD_DEFAULT);
        $user->is_confirmed = false;
        $user->role = 'user';
        $user->auth_token = sha1(random_bytes(100)).sha1(random_bytes(100));
        $user->save();

        return $user;
    }
}
