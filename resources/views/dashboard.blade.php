<x-app-layout>
    <div class="flex items-center justify-center min-h-screen relative overflow-hidden">
        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('images/dashboard.jpg'); filter: blur(8px);"></div>
        <div class="absolute inset-0 bg-black opacity-30"></div>
    <div class="container mt-4"> 

        <div class ="row">
            @if(count($users) > 0)
            
            <div class="col-md-3">

                <ul class = "list-group">
                    @foreach($users as $user)
                    @php
                            if($user->image != "" && $user->image !=null){
                                $image = $user->image;
                            }
                            else{
                                $image="images/dummy.png";
                            }
                            
                                
                            
                        @endphp
                    <li class="list-group-item list-group-item-dark cursor-pointer user-list" data-id="{{$user->id}}">
                        
                        <img src="{{ $image}}" alt="" class="user-image">
                        {{ $user->name}}
                        <b><sup id="{{$user->id}}-status" class="offline-status">Offline</sup></b>
                    </li>
                    @endforeach
                </ul>
            </div>

            <div class="col-md-9">
                <h1 class="start-head">Click in user to Start the chat</h1>

                <div class="chat-section">

                    <div id="chat-container">
                  {{-- <div class="current-user-chat">
                           <h1>hi sugam</h1>
                        </div>
                        <div class="distance-user-chat">
                            <h2>hello</h2>
                        </div>  --}}
                  </div> 
                    <form action="" id="chat-form">
                        <input type="text" name="message" placeholder="Enter Message" id="message" class="border" required>
                        <input type="submit" value = "Send Message" class="btn btn-primary">
                    </form>

                

            </div>

            
            @else
                <div class = "col-md-12">
                    <h3>Users not Found!!</h3>
                </div>
            @endif
        </div>
        </div>
</x-app-layout> 
