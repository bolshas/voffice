<?php
$this->Html->addCrumb($user->name);
?>

<div class="row">
	<div class="col-md-3">
		<div class="box box-primary">
			<div class="box-body box-profile">
				<img class="profile-user-img img-responsive img-circle" src="https://avatars3.githubusercontent.com/u/796840?v=3&s=140">
				<h3 class="profile-username text-center"><?= $user->name; ?></h3>
				<p class="text-muted text-center"><?= $this->Text->autoLinkEmails($user->email); ?></p>
				<ul class="list-group list-group-unbordered">
					<li class="list-group-item">
						<b>Joined</b>
						<span class="pull-right"><?= $this->Time->timeAgoInWords($user->created); ?></span>
					</li>
					<li class="list-group-item">
						<b>Last Login</b>
						<span class="pull-right"><?= $this->Time->timeAgoInWords($user->lastLogin); ?></span>
					</li>
				</ul>
				<a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
			</div>
		</div>	
		
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">About me</h3>
			</div>
			<div class="box-body">
				<strong>
					<i class="fa fa-book margin-r-5"></i>
					Education
				</strong>
				<p class="text-muted">
					Lorem ipsum
				</p>
			</div>
		</div>
	</div>
	<div class="col-md-9">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Recent meetings</h3>
			</div>
			<div class="box-body">
				<?php
				pr ($test->toArray()[0]->meetings[0]->toArray());
				foreach ($user->meetings as $meeting) {
					echo $meeting->title;
					echo "<hr>";
					// echo "<tr>";
					// echo "<td>$user->name</td>";
					// echo "<td>$user->email</td>";
					// echo "<td>$user->created</td>";
					// echo "<td>$user->modified</td>";
					// echo "<td>" . $this->Html->link('view', ['action' => 'view', $user->id]) . "</td>";
					// echo "<td>" . $this->Html->link('edit', ['action' => 'edit', $user->id]) . "</td>";
					// echo "<td>" . $this->Html->link('delete', ['action' => 'delete', $user->id]) . "</td>";
					// echo "</tr>";
				}
				?>
			</div>
		</div>
	</div>
</div>