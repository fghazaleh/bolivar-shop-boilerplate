<?php
/**
 * Created by PhpStorm.
 * User: Ghazaleh
 * Date: 5/6/17
 * Time: 5:59 PM
 */

namespace App\Foundation\Services\Contracts;


use App\Foundation\Exceptions\DataNotFoundException;
use Illuminate\Http\Request;

interface UserServiceInterface
{
    /**
     * @param Request $request
     * @return \App\Entity\User ;
     */
    public function create(Request $request);

    /**
     * @param int $id;
     * @return \App\Entity\User;
     * @throws DataNotFoundException
     */
    public function getById($id);
}