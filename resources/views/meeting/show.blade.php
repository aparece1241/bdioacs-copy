@extends('layouts.app')

@section('breadcrums')
    <li class="breadcrumb-item"><a href="{{ route('users.profile', Auth::user()) }}">Meetings</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ $meeting->room }}</li>
@endsection

@section('content')
    <section class="section">
        <div class="section-body">
            <div id="meet"></div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="{{ asset('js/jitsi.js') }}"></script>
@endpush
@push('scripts_data')
    <script>
        const meeting = {!! json_encode($meeting) !!}
        const user = {!! Auth::user() !!}
    </script>
    <script>
        const domain = 'meet.jit.si';
        const options = {
            roomName: meeting.room,
            width: '100%',
            height: '800px',
            parentNode: document.querySelector('#meet'),
            userInfo: {
                email: user.email,
                displayName: user.name
            },
            configOverwrite: {
                subject: meeting.subject
            }
        };
        const api = new JitsiMeetExternalAPI(domain, options);
        api.addEventListener('participantRoleChanged', function(event) {
            console.log(event);
            if (event.role === "moderator") {
                api.executeCommand('password', meeting.password);
            }
        });
        api.addListener('videoConferenceLeft', function(e) {
            console.log(e);
            api.dispose();
        });
    </script>
@endpush
