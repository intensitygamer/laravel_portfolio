<?php

namespace App\Commands\User;

use Illuminate\Http\Request;

use App\Generators;

use App\Repositories\User\UserRegisterRepository;
use App\Repositories\Affiliate\AffiliateRegisterRepository;
use App\Repositories\SettingsRepository;
use App\Mail\User\RegistrationVerification;
use App\Tool\Emailer;

use Core\Domain\Entity\User as UserEntity;
use Core\Usecase\User\UserCreator;

use Carbon\Carbon;

class UserCreatorCommand
{
    protected $request;
    protected $settings;

    public function __construct(Request $request)
    {
        $this->request = $request;
        //$this->settings = (new SettingsRepository)->get_settings();
    }

    public function execute()
    {
        $data = $this->request->all();

        $require_verification = false;

        $entity = new UserEntity;
        $entity->email = $data['email'];
        $entity->username = $data['username'];
        $entity->password = $data['password'];
        $entity->first_name = $data['first_name'];
        $entity->last_name = $data['last_name'];
        $entity->address = $data['address'];
        $entity->gender = $data['gender'];
        $entity->contact_number = $data['contact_number'];
        $entity->designation = $data['designation'];
        $entity->dob = new Carbon($data['dob']);
        $entity->status = $data['status'];
        //set ip to zero
        $entity->last_login_ip = '0.0.0.0';

        $entity->roles = [$data['roles']];

        if ((bool) count($data['permissions']))
            $entity->permissions = array_keys($data['permissions']);

        $creator = new UserCreator(
            new UserRegisterRepository,
            new Emailer(new RegistrationVerification)
        );

        $user = $creator->handle($entity, $require_verification);

        return $user;
    }
}
