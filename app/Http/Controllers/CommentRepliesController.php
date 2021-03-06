<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentReplyRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\CommentReply;
use App\Comment;

class CommentRepliesController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentReplyRequest $request)
    {
        $user = Auth::user();

        $data = [

            'comment_id'=> $request->comment_id,
            'user_id' => $user->id,
            'body' => $request->body,

        ];

        CommentReply::create($data);

        $request->session()->flash('comment_message', 'Comment submitted');

        return redirect()->back()->with('success', 'The category has been saved.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comment = Comment::findOrFail($id);

        $replies = $comment->replies;

        return view('admin.comments.replies.show', compact('replies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CommentReplyRequest $request, $id)
    {
        CommentReply::findOrFail($id)->update($request->all());

        return redirect()->back()->with('success', 'The reply has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CommentReply::findOrFail($id)->delete();

        return redirect()->back()->with('warning', 'The reply has been deleted.');
    }
}
