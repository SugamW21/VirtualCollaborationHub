<x-app-layout>
    
        <head>
            <link rel="icon" href="images/logo.png" type="image/x-icon">
            <title>Virtual Collaboration Hub</title>
        </head>
    <div class="container mt-4">

        <img src="/{{$groupData->image}}" width="200px" height="200px" alt="">
        <p><b>{{$groupData->name}}</b></p>
        <p><b>Total Members:- </b>{{$totalMembers}}</p>

        @if($available != 0)
            <P>Available for <b>{{ $available }}</b> Members Only!</P>
        @endif

        @if($isOwner)
            <p>You are the <b>ADMIN</b> of this group. So you can't join this group!</p>
        
            @elseif($isJoined > 0)
            <p>You <b>already Joined</b> this group👍👍.</p>

            @elseif($available == 0)
            <p>Member Limit Already Filled💯.</p>

            @else
                <button class="btn btn-primary join-now" data-id="{{ $groupData->id}}">Join Now</button>
        @endif
        
    </div>
    
</x-app-layout>