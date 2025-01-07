$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function() {
    $('.user-list').click(function(){

        $('#chat-container').append('');

        var getUserId = $(this).attr('data-id');

        receiver_id = getUserId;


        $('.start-head').hide();
        $('.chat-section').show();
    });

    //save chat work

    $('#chat-form').submit(function(e){
        e.preventDefault();

        var message = $('#message').val();

        $.ajax({
            url: "/save-chat",
            type: "POST",
            data: {sender_id:sender_id, receiver_id:receiver_id, message:message},
            success: function(res){
                
                if(res.success){
                    $('#message').val('');

                    let chat = res.data.message;

                    let html = `
                    <div class="current-user-chat">
                        <h1>`+chat+`</h1>
                    </div>
                `;
                $('#chat-container').append(html);
                
                }
                else{
                    alert(res.msg);
                }
                
            }
            });



    });
});

Echo.join('status-update')
.here((users)=>{
    // console.log(users);
    for(let x = 0; x < users.length; x++){
        if(sender_id != users[x]['id']){
            $('#'+users[x]['id']+'-status').removeClass('offline-status');
            $('#'+users[x]['id']+'-status').addClass('online-status');
            $('#'+users[x]['id']+'-status').text('Online');
        }
    }
    })
.joining((user)=>{
    // console.log(user.name+'Joined')
    $('#'+user.id+'-status').removeClass('offline-status');
    $('#'+user.id+'-status').addClass('online-status');
    $('#'+user.id+'-status').text('Online');
})

.leaving((user)=>{
    // console.log(user.name+'Leaved')
    $('#'+user.id+'-status').addClass('offline-status');
    $('#'+user.id+'-status').removeClass('online-status');
    $('#'+user.id+'-status').text('Offline');
})

.listen('UserStatusEvent',(e)=>{
    // console.log('hhhh'+e);
});

Echo.private('broadcast-message')
.listen('.getChatMessage', (data) => {
    console.log(data);

    // let html = `
    // <div class="distance-user-chat">
    //     <h1>`+data.chat.message+`</h1>
    // </div>
    // `;
    // $('#chat-container').append(html);
});














//chat group script
$(document).ready(function(){
    $('#createGroupForm').submit(function(e){
        e.preventDefault();

        $.ajax({
            url:"/create-group",
            type:"POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success:function(res){
                alert(res.msg);
                if(res.success){
                    location.reload();
                }
            }
            
        });

    });
});


//member script

$(document).ready(function(){
    $('.addMember').click(function(){
        var id = $(this).attr('data-id');

        var limit = $(this).attr('data-limit');
    
        $('#add-group-id').val(id);
        $('#add-limit').val(limit);
    
        $.ajax({
            url:"/get-members",
            type:"POST",
            data: {group_id:id},
            success:function(res){
                
                if(res.success){
                    
                    var users = res.data;
                    var html = '';

                    for(let i = 0; i<users.length; i++){
                        let isGroupMemberChecked = '';
                        if(users[i]['group_user'] != null){
                            isGroupMemberChecked ='checked';
                        }
                        html += `
                            <tr>
                            <td>
                            <input type="checkbox" name="members[]" value="`+users[i]['id']+`"
                            `+isGroupMemberChecked+`/>
                            </td>
                            <td>
                            `+users[i]['name']+`
                            </td>
                            </tr>
                         `;
                    }
                    $('.addMembersInTable').html(html);
                }
                else{
                    alert(res.msg);   
                }
            }
        });
    });

    $('#add-member-form').submit(function(e){
        e.preventDefault();

        var formData = $(this).serialize();
        

        $.ajax({
            url:"/add-member",
            type:"POST",
            data: formData,
            success:function(res){
                
                if(res.success){
                    $('#memberModal').modal('hide');
                    $('#add-member-form')[0].reset();
                    alert(res.msg);
                }
                else{
                    $('#add-member-error').text(res.msg);

                    setTimeout(function(){
                        $('#add-member-error').text('')
                    },3000);
                }
            }
        })

    });
    $('.deleteGroup').click(function(){
        $('#delete-group-id').val($(this).attr('data-id'));
        $('#group-name').text($(this).attr('data-name'));
    });

    $('#delete-group-form').submit(function(e){
        e.preventDefault();

        var formData = $(this).serialize();

        $.ajax({
            url:"/delete-group",
            type:"POST",
            data: formData,
            success:function(res){
                
                if(res.success){
                    location.reload();
                }
                else{
                    alert(res.msg);
                }
            }
        });
    });
    $('.updateGroup').click(function(){
        $('#update-group-id').val($(this).attr('data-id'));
        $('#update-group-name').val($(this).attr('data-name'));
        $('#update-group-limit').val($(this).attr('data-limit'));
    });

    $('#updateGroupForm').submit(function(e){
        e.preventDefault();

        $.ajax({
            url:"/update-group",
            type:"POST",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success:function(res){
                alert(res.msg);
                if(res.success){
                    location.reload();
                }
               }
        });
    });


    $('.copy').click(function(){
        $(this).prepend('<span class="copied_text">Copied</span>');
        setTimeout(()=>{
            $('.copied_text').remove();
        },1000);

        var group_id = $(this).attr('data-id');

        var url = window.location.host+'/share-group/'+group_id;

        var temp = $("<input>");
        $('body').append(temp);
        temp.val(url).select();
        document.execCommand("copy");

        temp.remove();

    });

    $('.join-now').click(function(){

        $(this).text('Wait...');
        $(this).attr('disabled','disabled');

        var group_id = $(this).attr('data-id');

        $.ajax({
            url:"/join-group",
            type:"POST",
            data: {group_id:group_id},
            success:function(res){
                alert(res.msg);
                if(res.success){
                    location.reload();
                }
                else{
                    alert(res.msg);
                    $(this).text('Join Now');
                    $(this).removeAttr('disabled');
                }
            }
        });

    });

    $('.group-list').click(function(){

        $('#group-chat-container').append('');


        $('.group-start-head').hide();
        $('.group-chat-section').show();
    });

});

