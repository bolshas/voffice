<img class="profile-user-img img-responsive img-circle" src="https://avatars3.githubusercontent.com/u/796840?v=3&s=140">
<h3 class="profile-username text-center"><?= $user->name ?></h3>
<p class="text-muted text-center"><?= $this->Text->autoLinkEmails($user->email) ?></p>
<ul class="list-group list-group-unbordered">
	<li class="list-group-item">
		<b>Joined</b>
		<span class="pull-right"><?= $this->Time->timeAgoInWords($user->created) ?></span>
 	</li>
 	<li class="list-group-item">
 		<b>Last Login</b>
 		<span class="pull-right"><?= $this->Time->timeAgoInWords($user->lastLogin) ?></span>
 	</li>
</ul>
<a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>