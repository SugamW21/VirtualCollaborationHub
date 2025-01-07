<x-app-layout>
    {{-- <div class="flex items-center justify-center min-h-screen relative overflow-hidden">
        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('images/dashboard.jpg'); filter: blur(8px);"></div>
        <div class="absolute inset-0 bg-black opacity-30"></div>--}}
    <div class="container mt-4">  

        <div class ="row">
            @if(count($groups) > 0 || count($joinedGroups) > 0)
            
            <div class="col-md-3">

                <ul class = "list-group">
                    @foreach($groups as $group)

                    <li class="list-group-item list-group-item-dark cursor-pointer group-list" data-id="{{optional($group)->id}}">
                        
                        <img src="/{{ $group->image}}" class="user-image">
                        {{ $group->name}}
                    </li>
                    @endforeach

                    @foreach($joinedGroups as $group)

                    <li class="list-group-item list-group-item-dark cursor-pointer group-list" data-id="{{$group->getGroup->id}}">
                        
                        <img src="/{{ $group->getGroup->image}}" class="user-image">
                        {{ $group->getGroup->name}}
                    </li>
                    @endforeach


                </ul>
            </div>

            <div class="col-md-9">
                <h1 class="group-start-head">Click in user to Start the chat</h1>

                <div class="group-chat-section">

                    <div id="group-chat-container">
                  {{-- <div class="current-user-chat">
                           <h1>hi sugam</h1>
                        </div>
                        <div class="distance-user-chat">
                            <h2>hello</h2>
                        </div>  --}}
                  </div> 
                    <form action="" id="group-chat-form">
                        <input type="text" name="message" placeholder="Enter Message" id="message" class="border" required>
                        <input type="submit" value = "Send Message" class="btn btn-primary">
                    </form>

                

            </div>

            
            @else
                <div class = "col-md-12">
                    <h3>Groups not Found!!</h3>
                </div>
            @endif
        </div>
        </div>
</x-app-layout> 
