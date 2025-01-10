<p>Hello {{ $user->name }},</p>
<p>Click vào đây để xác minh email:</p>
<a href="{{ route('verification.verify', $user->id) }}">Xác minh Email</a>
