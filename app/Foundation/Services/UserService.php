<?php
/**
 * Created by PhpStorm.
 * User: Ghazaleh
 * Date: 5/6/17
 * Time: 5:59 PM
 */

namespace App\Foundation\Services;


use App\Entity\User;
use App\Events\UserWasCreated;
use App\Foundation\Exceptions\DataNotFoundException;
use App\Foundation\Exceptions\EmailAlreadyExistExceptions;
use App\Foundation\Services\Contracts\UserServiceInterface;
use Illuminate\Http\Request;

class UserService extends BaseService implements UserServiceInterface{

    /**
     * @var User
     */
    private $user;

    function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @param Request $request
     * @return User;
     * @throws EmailAlreadyExistExceptions
     */
    public function create(Request $request)
    {
        if ($this->user->where('email',$request->get('email'))->count() != 0) {
            throw new EmailAlreadyExistExceptions(sprintf('Email [%s] address already exist.', $request->get('email')));
        }

        $user = $this->user->create([
            'email' => $request->get('email'),
            'name' => $request->get('name'),
            'password' => $this->getEncryptPassword($request->get('password')),
        ]);
        event(new UserWasCreated($user));
        return $user;
    }
    /**
     * @param int $id;
     * @return User;
     * @throws DataNotFoundException
     */
    public function getById($id){

        $user = $this->user->where('id',$id)->first();
        if (!$user){
            throw new DataNotFoundException(sprintf('User data not found with Id [%s]',$id));
        }
        return $user;
    }

    private function getEncryptPassword($password)
    {
        return bcrypt($password);
    }


}