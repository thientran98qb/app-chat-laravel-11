<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Log System</title>
</head>
<body>
    <section class="px-5 flex justify-between items-center bg-slate-800 h-12">
        <p class="text-white font-bold leading-tight">
            zzzTDEVzzz
        </p>
        <div>
            -
        </div>
    </section>
    <section class="container mx-auto py-6">
        {{ $slot }}
    </section>
</body>
</html>
