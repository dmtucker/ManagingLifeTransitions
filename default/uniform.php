</head>
<body>
	<table id="main">
	<thead>
		<tr>
			<td colspan="2" id="banner">
				<a href="resources/files/areyoufeelingstressed.pdf" style="float:right; margin:30px 50px auto auto; font-size:16px;">Click here for a special offer from Joyce!</a>
			</td>
		</tr>
		<tr>
			<td colspan="2" id="heading"><!-- address --></td>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<td colspan="2" id="footing"><!-- copyright --></td>
		</tr>
		<tr>
			<td colspan="2" id="sitemap">
				<br />
				<?php
					$sitePages = roster();
					
					$pageCount = count($sitePages);
					$thisPage  = basename($_SERVER["PHP_SELF"]);
					
					foreach ($sitePages as $pagei => $page) {
						$title = substr($page,0,-4);
						if ($title == "index") $title = "home";
						
						?><a href="<?php echo $page; ?>"><?php echo strtoupper($title); ?></a><?php
						if ($pagei+1 != $pageCount) : ?>&nbsp;&bull;&nbsp;<?php endif;
						
						$navBar[$title]["link"] = $page;
						$navBar[$title]["down"] = ($page == $thisPage) ? $title."down" : $title;
					}
				?>
			</td>
		</tr>
		<tr>
			<td class="leftcell"><!-- spacer --></td>
			<td class="rightcell" style="font-size:10px; padding:15px 0px; text-align:center;">
				Images by SEEDesign
			</td>
		</tr>
	</tfoot>
	<tbody>
		<tr>
			<td class="leftcell" style="background:url('resources/images/banner2.jpg') top left no-repeat; padding-top:122px;">
				<?php
					foreach ($navBar as $name => $button) {
						?><a style="text-decoration:none;" href="<?php echo $button["link"]; ?>">
							<img class="navbutton" src="resources/images/buttons/<?php echo $button["down"]; ?>.gif" alt="<?php echo ucfirst($name);?>"
								 onMouseOut ="this.src='resources/images/buttons/<?php echo $button["down"]; ?>.gif'"
								 onMouseOver="this.src='resources/images/buttons/<?php echo $name; ?>over.gif'"
								 onMouseDown="this.src='resources/images/buttons/<?php echo $name; ?>down.gif'" />
						</a>
						<br /><?php
					}
				?>
			</td>
			<td class="rightcell" id="content">