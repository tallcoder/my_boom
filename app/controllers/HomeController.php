<?php

use App\Models\Lastfm;

class HomeController extends BaseController {

	public function showWelcome()
	{
		$data_array = array();

		$lastfm = new Lastfm;
		$lastfm->setup('fd02cbb3b08171367abf11d7a4dbe8ca', 'tallcoder', '947e36757150d6abd1828a40e4f12daf');
		$tracks = $lastfm->user('getRecentTracks');

		$data_array['recent_tracks'] = $tracks['recenttracks']['track'];

		if ($handle = opendir('/home/duane/www/')) {
		    while (false !== ($file = readdir($handle))) {
		        if ((preg_match('/.com/i', $file) || preg_match('/.org/i', $file) || preg_match('/.net/i', $file)) && !$this->_is_dir_empty($file)) {
		            $dirs[] = $file;
		        }
		    }
		    closedir($handle);
		    sort($dirs);
		}

		$data_array['dirs'] = $dirs;

		return View::make('home', $data_array);
	}

	private function _is_dir_empty($dir) {
		if (!is_readable($dir)) return false;
		return (count(scandir($dir)) == 2);
	}

}