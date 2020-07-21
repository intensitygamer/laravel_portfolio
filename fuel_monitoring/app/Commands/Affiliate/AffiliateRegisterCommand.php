<?php

namespace App\Commands\Affiliate;

use Illuminate\Http\Request;

use App\Repositories;
use App\Generators;
use App\Validators;
use App\Mail;
use App\Tool\Emailer;

use Core\Domain\Entity;
use Core\Usecase\Affiliate\AffiliateRegister;
use Core\Exception;

use Carbon\Carbon;

class AffiliateRegisterCommand
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function execute()
    {
        $usecase = new AffiliateRegister(
            new Repositories\Affiliate\AffiliateRegisterRepository,
            new Validators\Affiliate\AffiliateRegisterValidator,
            new Emailer(new Mail\Affiliate\RegistrationVerification)
        );

        $affiliate = new Entity\Affiliate;
        $affiliate->set_properties ($this->request->all());

        // build birthdate
        $birthdate = new Carbon;
        $birthdate->year = $this->request->get('year');
        $birthdate->month = $this->request->get('month');
        $birthdate->day = $this->request->get('day');

        $affiliate->birthdate = $birthdate->format('Y-m-d');

        // generate pin code
        $affiliate->pin = (new Generators\PinCode)->generate();

        // generate affiliate code
        $affiliate->affiliate_code = (new Generators\AffiliateCode($affiliate->username))->generate();

        $new_affiliate = $usecase->handle($affiliate, $this->request->get('invite_code', null));
    }
}