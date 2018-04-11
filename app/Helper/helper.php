<?php
	namespace App\Helper;
	class Helper{
		public static function upload($file, $folderName)
		{
			$filename = $file->getClientOriginalName();
			$file->move($folderName, $filename);
			return $filename;
		}
	}