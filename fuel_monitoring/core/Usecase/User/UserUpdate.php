<?php

namespace Core\Usecase\User;

use Core\Domain\Entity\User as UserEntity;
use Core\Repository\User\UserRepository;
use Core\Repository\User\UserUpdateRepository;
use Core\Usecase\User\UserDetail;
use Core\Emailer;
use Core\Validator;
use Core\Exception;

class UserUpdate
{
    protected $repository;
    protected $user_repository;

    public function __construct(UserUpdateRepository $repository, UserRepository $user_repository)
    {
        $this->repository = $repository;
        $this->user_repository = $user_repository;
    }

    public function handle($username, UserEntity $entity, $impersonated = false)
    {
        $data = [];

        if ($entity->email)
            $data['email'] = $entity->email;

        if ($entity->name)
            $data['name'] = $entity->name;

        if ($entity->first_name)
            $data['first_name'] = $entity->first_name;

        if ($entity->last_name)
            $data['last_name'] = $entity->last_name;

        if ($entity->dob)
            $data['dob'] = $entity->dob;

        if ($entity->gender)
            $data['gender'] = $entity->gender;

        if ($entity->contact_number)
            $data['contact_number'] = $entity->contact_number;

        if ($entity->designation)
            $data['designation'] = $entity->designation;

        if ($entity->address)
            $data['address'] = $entity->address;

        if ($entity->password)
            $data['password'] = $entity->password;

        if ($entity->status)
            $data['status'] = $entity->status;

        if ($entity->roles)
            $data['roles'] = $entity->roles;

        $data['permissions'] = $entity->permissions;

        $this->validate($entity);

        $this->repository->update_user($username, $data);

        if ($impersonated)
        {
            $user = $this->user_repository->get_by_credential($username);
            $this->send_update_notification([
                'email' => $user['email'],
                'name' => $user['first_name'].' '.$user['last_name'],
                'fields' => $data
            ]);
        }
    }

    protected function validate($entity)
    {
        $validator = new Validator;

        $genders = implode(',', UserEntity::available_genders());

        $inputs = [];

        $validator->setup($inputs);

        if (isset($entity->username))
        {
            $validator->add_input('username', $entity->username);
            $validator->add_rule('username', ['sometimes', 'required', 'unique:users,username,'.$entity->username.',username']);
        }

        if (isset($entity->email))
        {
            $validator->add_input('email', $entity->email);
            $validator->add_rule('email', ['sometimes', 'required', 'unique:users,email,'.$entity->username.',username']);
        }

        if ($entity->password)
        {
            $validator->add_input('password', $entity->password);
            $validator->add_input('password_confirmation', $entity->password_confirmation);
            $validator->add_rule('password', ['required', 'confirmed', 'min:8', 'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X]).*$/']);
        }

        if (! $validator->is_valid())
            throw new Exception\Validation($validator);
    }

    protected function send_update_notification($data)
    {
        $emailer = new Emailer;

        $emailer
            ->receiver($data['email'])
            ->subject('User Profile Update')
            ->data($data)
            ->body('emails.profile_update');
            //->queue();
    }
}
