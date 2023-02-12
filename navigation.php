<script type="text/javascript">
	$(document).ready(function() {
		$('#menu a').click(function() {
			var url = $(this).attr('href');
			$('#content').load(url);
			return false;
		});
	});
</script>
<div class="container-fluid">
	<font face="Gill Sans MT" size="+1">
		<nav id="menu" class="navbar navbar-default">
			<ul class="nav navbar-nav">
				<li>
					<a href="index.php" role="button" aria-haspopup="true" aria-expanded="false">
						<strong><i class="glyphicon glyphicon-home"></i> Home</strong>
					</a>
				</li>
				<li>
					<a href="?page=konsultasi" role="button" aria-haspopup="true" aria-expanded="false">
						<strong><i class="glyphicon glyphicon-modal-window"></i> Konsultasi</strong>
					</a>
				</li>
			</ul>
		</nav>
	</font>
</div>