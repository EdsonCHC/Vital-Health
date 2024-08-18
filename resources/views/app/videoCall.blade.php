<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Video Llamada</title>

</head>

<body class="bg-gray-100">
    <div class="flex justify-center items-center content-center mx-auto p-4">

    </div>
    <div id="meet"></div>
    <script src="https://meet.jit.si/external_api.js"></script>
    <script>
        const domain = 'meet.jit.si';
        const options = {
            roomName: '{{ $roomName }}',
            width: 700,
            height: 700,
            parentNode: document.querySelector('#meet')
        };
        const api = new JitsiMeetExternalAPI(domain, options);
    </script>
</body>

</html>
