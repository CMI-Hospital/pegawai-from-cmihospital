<!DOCTYPE html>
<html>
<head>
    <title>Database Connection Result</title>
</head>
<body>
    <h1>Database Connection Result</h1>
    
    <h4>{{ $statuss }}</h4>

    @if(session('status'))
        <div>{{ session('status') }}</div>
    @else
        <div>Tidak ada status</div>
    @endif

    
</body>
</html>
