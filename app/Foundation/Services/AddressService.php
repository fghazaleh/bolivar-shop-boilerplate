<?php
/**
 * Created by PhpStorm.
 * User: Ghazaleh
 * Date: 5/6/17
 * Time: 5:59 PM
 */

namespace App\Foundation\Services;

use App\Entity\Address;
use App\Foundation\Exceptions\DataNotFoundException;
use App\Foundation\Services\Contracts\AddressServiceInterface;
use Illuminate\Http\Request;


class AddressService extends BaseService implements AddressServiceInterface
{
    /**
     * @var Address
     */
    private $address;

    function __construct(Address $address)
    {
        $this->address = $address;
    }
    /**
     * @param Request $request ;
     * @return \App\Entity\Address;
     * @todo list: fire event when address is created.
     * */
    public function create(Request $request)
    {
        return $this->address->create([
            'address1' => $request->get('address1'),
            'address2' => $request->get('address2'),
            'city' => $request->get('city'),
            'postal_code' => $request->get('postal_code'),
            'user_id' => $request->get('user_id'),
        ]);
    }
    /**
     * @param int $id;
     * @return Address;
     * @throws DataNotFoundException
     */
    public function getById($id){

        $user = $this->address->where('id',$id)->first();
        if (!$user){
            throw new DataNotFoundException(sprintf('Address data not found with Id [%s]',$id));
        }
        return $user;
    }
}