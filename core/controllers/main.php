<?php
	function action_index()
	{
		render('student', ['title'=>'Index Page']);
	}
	function action_profile()
	{
		echo '<p style="font-size: 14px">Profile</p>';
		render('student', ['title'=>'Index Page']);
	}
	function action_notification()
	{
		echo '<p style="font-size: 14px">Notification</p>';
		render('student', ['title'=>'Index Page']);
	}
