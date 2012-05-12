Hi,

Thanks for downloading this script.

It's sole purpose is having fun - and learning by doing.

I would probably never had come across the ELO rating system if it hadn't been for Marc Zuckerberg
and the movie: The social network. Great movie and a lot of fun and inspiration!

The script is not really in a production state and there is plenty room for improvement (if you make any
just mail me so I can update the source with your addons).

To get you going:

1) upload all files to your website/testspace or whereever you wanna play with it.
2) setup your database - look in the file: mysql.php
3) execute this SQL to setup your database tables:

		CREATE TABLE IF NOT EXISTS `battles` (
			`battle_id` bigint(20) unsigned NOT NULL auto_increment,
			`winner` bigint(20) unsigned NOT NULL,
			`loser` bigint(20) unsigned NOT NULL,
			PRIMARY KEY  (`battle_id`),
			KEY `winner` (`winner`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
		
		
		CREATE TABLE IF NOT EXISTS `images` (
			`image_id` bigint(20) unsigned NOT NULL auto_increment,
			`filename` varchar(255) NOT NULL,
			`score` int(10) unsigned NOT NULL default '1500',
			`wins` int(10) unsigned NOT NULL default '0',
			`losses` int(10) unsigned NOT NULL default '0',
			PRIMARY KEY  (`image_id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

4) place all your images that's up for battle in the /imagees/ folder.
5) run the /install_images.php from your site to install all images from your folder into your database.
6) have fun!


Best regards from Denmark,

/Anders






