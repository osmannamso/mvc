<html>
	<head>
		<title><?=$data['title']?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="/css/student.css">
	</head>
	<body>
		<div class="nav">
			<div class="item home"><img src="/img/icons/home.png"></div>
			<div class="item loupe"><img src="/img/icons/search.png"></div>
			<div class="item notification"><img src="/img/icons/notification.png"></div>
			<div class="item profile"><img src="/img/icons/profile.png"></div>
		</div>
	</body>
	<script>
		$('.item.profile').click(function(){
			window.location.href = '/main/profile'
		})
		$('.item.notification').click(function(){
			window.location.href = '/main/notification'
		})
	</script>
</html>