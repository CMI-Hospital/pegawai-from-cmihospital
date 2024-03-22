<!DOCTYPE html>
<html>
<head>
    <title>Database Connection Check</title>
</head>
<body>
    <h1>Database Connection Check</h1>

    @if(session('status'))
        <div>{{ session('status') }}</div>
    @endif

    <form action="{{ route('database.check') }}" method="post">
        @csrf
        <button type="submit">Check Database Connection</button>
    </form>
</body>
</html>
