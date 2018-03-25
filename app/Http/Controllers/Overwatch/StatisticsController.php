<?php
namespace App\Http\Controllers\Overwatch;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use App\Helper\Caching;
use App\Models\Overwatch\Competitive;

class StatisticsController extends Controller {

	public function index() {
		$array = [
			'total'	=> 0,
			'wins'	=> 0,
			'loses'	=> 0,
			'draws'	=> 0
		];
		$stats = Competitive::orderBy('id', 'DESC')->get();
		foreach($stats as $stat) {
			$array['total'] += $stat['total'];
			$array['wins'] += $stat['wins'];
			$array['loses'] += $stat['loses'];
			$array['draws'] += $stat['draws'];
		}
		return $array;
	}

}