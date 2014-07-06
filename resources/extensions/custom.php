<?php

function roster ()
{
	//pre-condition
	assert (file_exists("sitemap.xml"));
	
	$sitemap = simplexml_load_file("sitemap.xml");
	foreach ($sitemap->url as $url) $pages[] = substr($url->loc,strlen("http://inner-calm.net/"));
	
	return $pages;
}

?>