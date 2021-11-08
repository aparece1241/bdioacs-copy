<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div id="meet"></div>
    <script src="{{ asset('js/jitsi.js') }}"></script>
    <script>
        const room = {!! json_encode(\Str::random(15)) !!}
        const param = {!! json_encode(\Request::query()) !!}
    </script>
    <script>
        console.log(param);
        const domain = 'meet.jit.si';
        const options = {
            roomName: param.code,
            width: 700,
            height: 700,
            parentNode: document.querySelector('#meet'),
            userInfo: {
                email: param.email,
                displayName: param.name
            },
            configOverwrite: {
                subject: 'Subject'
            }
        };
        const api = new JitsiMeetExternalAPI(domain, options);
        api.addEventListener('participantRoleChanged', function(event) {
            console.log(event);
            if (event.role === "moderator") {
                api.executeCommand('password', '123');
            }
        });
        api.on('passwordRequired', function(e) {
            console.log(e);
            // api.executeCommand('password', 'The Password');
        });
        console.log(api.getParticipantsInfo());
    </script>
</body>

</html>
