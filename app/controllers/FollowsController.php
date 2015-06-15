<?php

use Larabook\Users\FollowUserCommand;
use Larabook\Users\UnfollowUserCommand;

class FollowsController extends \BaseController {

	/**
	 * Follow a user.
	 *
	 * @return Response
	 */
	public function store()
	{

        $pusher = new Pusher('db44e6f643901a1da9b8', '9366930f5d8629fc6bb5', '117191');

        $input = array_add(Input::get(), 'userId', Auth::id());

        $this->execute(FollowUserCommand::class, $input);

        $pusher->trigger('larabook', 'userFollowsYou', ['title' => 'You have a new follower!']);

        Flash::success('You are now following this user.');

        return Redirect::back();
	}

    /**
     * Unfollow a user.
     *
     * @param $userIdToUnfollow
     * @internal param int $id
     * @return Response
     */
	public function destroy($userIdToUnfollow)
	{
        $pusher = new Pusher('db44e6f643901a1da9b8', '9366930f5d8629fc6bb5', '117191');

        $input = array_add(Input::get(), 'userId', Auth::id());

        $this->execute(UnfollowUserCommand::class, $input);

        $pusher->trigger('larabook', 'userUnfollowsYou', ['title' => 'You have a new follower!']);

        Flash::success('You have now unfollowed this user.');

        return Redirect::back();
	}


}
