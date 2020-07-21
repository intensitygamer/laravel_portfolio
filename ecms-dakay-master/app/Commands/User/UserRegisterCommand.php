<?php

namespace App\Commands\User;

use Illuminate\Http\Request;

use App\Repositories\UserRegisterRepository;
use App\Repositories\Affiliate\AffiliateRegisterRepository;
use App\Repositories\SettingsRepository;

use App\Generators;
use App\Mail\User\RegistrationVerification;
use App\Tool\Emailer;

use Core\Object;
use Core\Domain\Entity\User as UserEntity;
use Core\Usecase\User\UserRegister;

use Carbon\Carbon;

class UserRegisterCommand
{
    protected $request;
    protected $settings;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->settings = (new SettingsRepository)->get_settings();
    }

    public function execute()
    {
        $data = $this->request->all();

        $usecase = new UserRegister(
            new UserRegisterRepository,
            new AffiliateRegisterRepository,
            new Emailer(new RegistrationVerification),
            new SettingsRepository
        );

        $entity = new UserEntity;
        $entity->name = trim($data['name']);
        $entity->email = $data['email'];
        $entity->password = $data['password'];
        $entity->username = $data['username'];
        $entity->contact_number = $data['contact_number'];
        $entity->member_code = (new Generators\MemberCode($entity->username))->generate();
        $entity->roles = $data['roles'];

        $entity->bank_id = $data['bank_id'];
        $entity->bank_account_name = $data['bank_account_name'];
        $entity->bank_account_number = $data['bank_account_number'];

        $user = $usecase->handle($entity, $data['ref']);

        return $user;
    }
}
