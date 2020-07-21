Hi {{ $name }},

<p>To activate your account click the link below or copy/paste to your browser address bar.</p>

<p>
    <table style="border:1px solid #000">
        <tr>
            <td style="border:1px solid #000">Email verification link: </td> <td><a href="{{ $activation_link }}">{{ $activation_link }}</a></td>
        </tr>
    </table>
</p>

<p>After verification you may login to your account using username or email and password below.</p>

<p>
    <table style="border:1px solid #000">
        <tr>
            <td style="border:1px solid #000">Your Username: </td> <td>{{ $username }}</td>
        </tr>
        <tr>
            <td style="border:1px solid #000">Your Email: </td> <td>{{ $email }}</td>
        </tr>
        <tr>
            <td style="border:1px solid #000">Your Password: </td> <td>{{ $password }}</td>
        </tr>
    </table>
</p>


<p>Please take note that you need to change your password for security after logged IN. Don't share your password.</p>

<p>Thanks, dakay team</p>