<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Chat;
use App\Events\MessageEvent;
use App\Models\group;
use App\Models\Member;



// createGroup
class UserController extends Controller
{
    public function loadDashboard()
    {
        $users = User::whereNotIn('id', [auth()->user()->id])->get();
        return view('dashboard', compact('users'));
    }

    public function saveChat(Request $request){
        try{

            $chat = Chat::create([
                'sender_id' => $request->sender_id,
                'receiver_id' => $request->receiver_id,
                'message' => $request->message
            ]);
            event(new MessageEvent($chat));
           
            return response()->json(['success' =>true, 'data' => $chat]); 
        }catch(\Exception $e){
            return response()->json(['success' =>false, 'msg' => $e->getMessage()]);
        }
    }

    public function loadGroups(){
        $groups = Group::where('creator_id', auth()->user()->id)->get();
        return view('groups', compact('groups'));
    }
    
    public function createGroup(Request $request)
    {
        try{
            $imageName = '';
            if($request->image){
                $imageName = time().'.'.$request->image->extension();
                $request->image->move(public_path('images'), $imageName);
                $imageName = 'images/'.$imageName;
            }

            Group::insert([
            'creator_id' => auth()->user()->id,
            'name' => $request->name,
            'image' => $imageName,
            'join_limit' => $request->limit
            ]);
            return response()->json(['success' => true,'msg' => $request->name.'Group has been created successfully']);

        } catch (\Exception $e){
            return response()->json(['success' => false,'msg' => $e->getMessage()]);

        }
    
    }

    public function getMembers(Request $request)
    {
        try{
            
            $users = User::with(['groupUser' => function($query) use($request){
                $query->where('group_id',$request->group_id);
            }])
            ->whereNotIn('id',[auth()->user()->id])->get();

            return response()->json(['success' => true, 'data' => $users]);

        } catch (\Exception $e){
            return response()->json(['success' => false,'msg' => $e->getMessage()]);

        }
    
    }

    public function addMembers(Request $request)
    {
        try{
            
            if(!isset($request->members)){
                return response()->json(['success' => false, 'msg' => 'please select any one Member']);
            }
            else if(count($request->members) > (int)$request->limit){
                return response()->json(['success' => false, 'msg' => 'You can not select more than'.$request->limit.'Members!']);
            }
            else{
                Member::where('group_id', $request->group_id)->delete();

                $data = [];
                $x = 0;
                foreach($request->members as $user){
                    $data[$x] = ['group_id'=>$request->group_id, 'user_id' => $user];
                    $x++;
                }
                Member::insert($data);



                return response()->json(['success' => false, 'msg' => 'Member added Successfully']);
            }


        } catch (\Exception $e){
            return response()->json(['success' => false,'msg' => $e->getMessage()]);

        }
    
    }


    public function deleteGroup(Request $request)
    {
        try{

            Group::where('id', $request->id)->delete();
            Member::where('group_id', $request->id)->delete();
            
            return response()->json(['success' => true]);

        } catch (\Exception $e){
            return response()->json(['success' => false,'msg' => $e->getMessage()]);

        }
    
    }


    public function updateGroup(Request $request)
    {
        try{
            $data =[];

            $imageName = '';
            if($request->image){
                $imageName = time().'.'.$request->image->extension();
                $request->image->move(public_path('images'), $imageName);
                $imageName = 'images/'.$imageName;

                $data = [
                    'creator_id' => auth()->user()->id,
                    'name' => $request->name,
                    'join_limit' => $request->limit,
                    'image' => $imageName
                ];
            }
            else{
                $data = [
                    'creator_id' => auth()->user()->id,
                    'name' => $request->name,
                    'join_limit' => $request->limit,
                ];
            }
            $groupData = Group::where('id',$request->id)->first();

            if($request->limit < $groupData->join_limit){
                Member::where('group_id',$request->id)->delete();
            }

            Group::where('id',$request->id)->update($data);
            
            return response()->json(['success' => true, 'msg'=>'Group has been updated successfully']);

        } catch (\Exception $e){
            return response()->json(['success' => false,'msg' => $e->getMessage()]);

        }
    
    }
    public function shareGroup($id){
        $groupData = Group::where('id',$id)->first();

        if($groupData){
            $totalMembers = Member::where('group_id',$id)->count();

            $available = $groupData->join_limit - $totalMembers;

            $isOwner = $groupData->creator_id == auth()->user()->id ? true: false;

            $isJoined = Member::where(['group_id' => $id, 'user_id' => auth()->user()->id])->count();
            
            return view('shareGroup',compact(['groupData','totalMembers','available','isOwner','isJoined']));
        }else{
            return view('404');
        }
    }

    public function joinGroup(Request $request){
        try{
    
            Member::insert([
                'group_id' => $request->group_id,
                'user_id' => auth()->user()->id
            ]);
    
            return response()->json(['success' => true,'msg' => 'Congratulations!, you have been joined successfully']);
        }
         catch (\Exception $e){
            return response()->json(['success' => false,'msg' => $e->getMessage()]);
    
        }
    }


    public function groupChats(Request $request)
    {
        $groups = Group::where('creator_id', auth()->user()->id)->get();
        $joinedGroups = Member::with('getGroup')->where('user_id', auth()->user()->id)->get();
        return view('group-chats', compact(['groups', 'joinedGroups']));
    }

}
