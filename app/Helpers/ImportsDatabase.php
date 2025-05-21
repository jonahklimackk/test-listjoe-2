<?php

namespace app\Helpers;

use App\Models\User;

class ImportsDatabase
{


	/**
	* Imports the table
	*
	* @return int
	*/
	public static function import()
	{
		// somehow the double quotes worked, so no need to changew the pw
		// the dollar signs are fine apparently
		// $importData = str_replace ("$", "\$", $importData)




		// $theMagicInsert = "insert into users values (1,"Jonah Klimack","listjoe2","jonahklimackk2@gmail.com",NULL,"$2y$12$T3LqEtt1EBFe9ZUR3k/Em.odOPt0JaE44cdXnlPDfN4WKzVO44c7W",NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,now(),now(),"free",NULL,0,0,0,0,"",NULL, 0,0,""";
		// $tmi = explode(",", $theMagicInsert);

		// dump (count($tmi));
		// exit;


		$dataToBeAppended = 'NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,now(),now(),"free",NULL,0,0,0,0,"",NULL, 0,0,"",1';
		$dataToBeAppended2 = explode(",", $dataToBeAppended);
			// dump($data2);



					// IMPORT SELECT QUERIES INTO THIS VARIABALE - 
		$importData = 'INSERT INTO `users` VALUES (583,"Bridget Malone","bridgetmalone","bridgetmalone05@gmail.com","2024-12-09 18:08:36","$2y$12$UEknZEaGOsicaYfZHKJ/Xu4TG7EJgkcj.ZtXst8mOStT1qlopKIGG",NULL,NULL,NULL,NULL,609,NULL,"2024-12-09 18:08:19","2024-12-09 18:08:36");
INSERT INTO `users` VALUES (584,"vpflowKed","vpflowKed","vpflowersm@maildom.online","2024-12-09 19:43:34","$2y$12$WiLHgIWD/Cf6IU3KA6BtcO8vbCBidvUU6dDWwaXQYJ0kUmU8uJwVm",NULL,NULL,NULL,NULL,610,NULL,"2024-12-09 19:41:56","2024-12-09 19:43:34");
INSERT INTO `users` VALUES (585,"Dan Lillpop","eaglesretire","eaglesretire@gmail.com",NULL,"$2y$12$Y8pT6GgL65KCuwLk4vEj8.fiwyfANG4bQJ7nYUcGv9KXgFJFWM6Z6",NULL,NULL,NULL,NULL,611,NULL,"2024-12-10 01:49:53","2024-12-10 01:49:54");
INSERT INTO `users` VALUES (586,"Doplo kilot *111 listjoe.com Dc","Doplo kilot *111 listjoe.com Dc","mi.taxebandilis@gmail.com",NULL,"$2y$12$8asZWBv7T3onK25avZWcEeWiglH9avfQhx5AcnEhuMrYcpMuhjlGS",NULL,NULL,NULL,NULL,612,NULL,"2024-12-10 02:55:59","2024-12-10 02:56:00");
INSERT INTO `users` VALUES (587,"Samantha","Swyllie","samanthawyllie@hotmail.com",NULL,"$2y$12$OxhgPOq9FfvamkKiWA7gpeZUoOp7KrJBDIM7vcwWJMxIL3tK6GgyK",NULL,NULL,NULL,NULL,613,NULL,"2024-12-10 03:09:07","2024-12-10 03:09:08");
INSERT INTO `users` VALUES (588,"Alafia Azhar","Alafiazr","alafiaazhar1@gmail.com","2024-12-10 12:47:02","$2y$12$KmXZRvrZLF2lSLfZrbUFd..S3LETquSv.X4/buKXqwC3FRRTMMEXu",NULL,NULL,NULL,NULL,614,NULL,"2024-12-10 12:46:36","2024-12-10 12:47:02");
INSERT INTO `users` VALUES (589,"Brenda underwood","income2010","brendakay1963@gmail.com","2024-12-10 16:22:20","$2y$12$KWC.GD9riSo6OMw.wTY3POqIaUZh.qINQJteC3pR7IyTClPXCMVzG",NULL,NULL,NULL,NULL,615,NULL,"2024-12-10 16:21:26","2024-12-10 16:22:20");
INSERT INTO `users` VALUES (590,"Jason","joickle","jasonoick.le@gmail.com",NULL,"$2y$12$eQneBq1hlF33MTFnIHEgeOPAe7vtbpMfrRg6LVNQevkiry7jn7KpK",NULL,NULL,NULL,NULL,616,NULL,"2024-12-10 19:15:38","2024-12-10 19:15:39");';















		$importData2 = explode(");", $importData);

		$handle = fopen("/home/jonah/new-users.sql", "w");

		foreach ($importData2 as $import){
				// dump($import);
			$noNewLines = str_replace("\t", "",$import);
			$noNewLines2 = str_replace("\n", "",$noNewLines);
				// dump($noNewLines2);/

				//now wee have to chop off everythnig afetr x in the array
			$importData3 = explode(",", $noNewLines2);
				// dump($importData3);
			$importData4 = array_slice($importData3, 0, 6);

				//this is it, this is the first 6 entries
				//append data to importdata4
				// dump($importData4);
			$importData5 = array_merge($importData4, $dataToBeAppended2);
				// dump($importData5);

				//co9py and paste these
			$importData6 = implode(",", $importData5);

			$sqlPrefix = "insert into users values(";
			$sqlPostfix = ");";

			$sqlToExportOneLine = $sqlPrefix.$importData6.$sqlPostfix;
				// dump($sqlToExport);

				// now I need to make a file and inseirt this into it
			$sqlToExport[] = $sqlToExportOneLine;
			fwrite($handle, $sqlToExportOneLine."\n");

		}

			//write this to file now now it/s all in one array
		dump($sqlToExport);

		fclose($handle);





	}
}