<?php

namespace Modules\FrontOffice\Http\Controllers\Auth;

use App\Repositories\OTPRepository;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Tool\Authenticator;
use App\Tool\OTP;
use App\Tool\OTPResendCounter;

use Core\Exception;

class RegisterOTPController extends Controller
{
    private $otp_resend_counter;

    public function index(Request $request, OTP $otp)
    {
        $authenticator = new Authenticator;

        $otp_resend_counter = new OTPResendCounter($authenticator->get_authenticated_id(), 'register');

        if ($authenticator->is_otp_verified())
            return redirect('/');

        return view('dewaayam.front_office.auth.register_otp', [
            'can_resend' => (new OTPRepository)->can_resend( $authenticator->get_authenticated_id(),'register'),
            'otp_exceeded' => $otp_resend_counter->has_exceeded()
        ]);
    }

    public function confirm(Request $request, OTP $otp, Authenticator $authenticator)
    {
        $code = $request->get('code', null);

        $request->flash();

        try
        {
            $otp->verify(
                $authenticator->get_authenticated_id(),
                $code,
                'register'
            );

            $otp_resend_counter = new OTPResendCounter($authenticator->get_authenticated_id(), 'register');
            $otp_resend_counter->reset();

            $request->session()->flash('success', trans('messages.registration verification success'));

            return redirect('/');
        }
        catch (Exception\OTPExpiredException $e)
        {
            $otp_resend_counter->reset();

            $request->session()->flash('error', trans('messages.otp code expired'));
            return redirect()->back();
        }
        catch (Exception\OTPFailedException $e)
        {
            $request->session()->flash('error', trans('messages.invalid otp code'));
            return redirect()->back();
        }
    }

    public function resend(Request $request, OTP $otp, Authenticator $authenticator)
    {
        $request->flash();

        try
        {
            $otp->send(
                $authenticator->get_authenticated_id(),
                'register'
            );

            $otp_resend_counter = new OTPResendCounter($authenticator->get_authenticated_id(), 'register');
            $otp_resend_counter->increment();

            $request->session()->flash('success', trans('messages.registration otp was resent'));

            return redirect()->back();
        }
        catch (\Exception $e)
        {
            return redirect()->back();
        }
    }
}