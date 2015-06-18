<?php

use Larabook\Statuses\LeaveCommentOnStatusCommand;

class CommentsController extends \BaseController {

	/**
	 * Leave a new comment.
	 *
	 * @return Response
	 */
	public function store()
	{
		$pusher = new Pusher('db44e6f643901a1da9b8', '9366930f5d8629fc6bb5', '117191');

        $input = array_add(Input::get(), 'user_id', Auth::id());

        $this->execute(LeaveCommentOnStatusCommand::class, $input);

        $pusher->trigger('larabook', 'UserCommentedOnStatus', $input);

        return Redirect::back();
	}

}