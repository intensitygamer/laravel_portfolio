<?php

namespace Core\Usecase\User;

use Core\Domain\Contract;
use Core\Domain\Entity\User as UserEntity;
use Core\Repository\User\UserRegisterRepository;
use Core\Repository\Affiliate\AffiliateRegisterRepository;
use Core\Repository\SettingsRepository;
use Core\Usecase\User\UserCreator;

class UserRegister
{
    protected $creator;
    protected $settings_repository;

    public function __construct(UserRegisterRepository $repository, AffiliateRegisterRepository $affiliate_repository,
        Contract\EmailerContract $emailer, SettingsRepository $settings_repository)
    {
        $this->creator = new UserCreator($repository, $affiliate_repository, $emailer);

        $this->settings_repository = $settings_repository;
    }

    public function handle(UserEntity $entity, $invite_code = null)
    {
        $settings = $this->settings_repository->get_settings();

        $new_user = $this->creator->handle($entity, false, $invite_code);

        return $new_user;
    }
}
