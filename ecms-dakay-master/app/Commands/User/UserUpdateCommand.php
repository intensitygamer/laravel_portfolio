<?php

namespace App\Commands\User;

use Illuminate\Http\Request;
use App\Repositories\User\UserRepository;
use App\Repositories\User\UserUpdateRepository;

use App\Generators;
use App\Tool\Authenticator;

use Core\Object;
use Core\Domain\Entity\User as UserEntity;
use Core\Usecase\User\UserUpdate;

use Carbon\Carbon;

class UserUpdateCommand
{
    private $username;
    private $data;
    protected $request;

    public function __construct($username, Request $request)
    {
        $this->username = $username;
        $this->data = $request->all();

        unset (
            $this->data['username']
        );

        $this->request = $request;
    }

    public function execute()
    {
        $usecase = new UserUpdate(
            new UserUpdateRepository,
            new UserRepository
        );

        $entity = new UserEntity;

        $entity->username = $this->username;

        if (isset($this->data['email']) && $this->data['email'])
            $entity->email = $this->data['email'];

        if (isset($this->data['password']) && $this->data['password'])
            $entity->password = $this->data['password'];

        if (isset($this->data['password_confirmation']))
            $entity->password_confirmation = $this->data['password_confirmation'];

        if (isset($this->data['name']))
            $entity->name = trim($this->data['name']);

        if (isset($this->data['first_name']))
            $entity->first_name = $this->data['first_name'];

        if (isset($this->data['last_name']))
            $entity->last_name = $this->data['last_name'];

        if (isset($this->data['dob']))
            $entity->dob = new Carbon($this->data['dob']);

        if (isset($this->data['gender']))
            $entity->gender = $this->data['gender'];

        if (isset($this->data['contact_number']))
            $entity->contact_number = $this->data['contact_number'];

        if (isset($this->data['designation']))
            $entity->designation = $this->data['designation'];

        if (isset($this->data['address']))
            $entity->address = $this->data['address'];

        if (isset($this->data['roles']))
            $entity->roles = $this->data['roles'];

        if (isset($this->data['status']))
            $entity->status = $this->data['status'];

        $permissions = null;

        if (isset($this->data['permissions']))
            $entity->permissions = array_keys($this->data['permissions']);

        // deactivate email notification
        // $impersonated = ($this->username != (new Authenticator)->get_username());
        $impersonated = false;

        $usecase->handle($this->username, $entity, $impersonated);
    }
}
