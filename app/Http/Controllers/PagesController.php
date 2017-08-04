<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class PagesController extends Controller
{
    public function about()
    {
    	//$name = 'Mai Havela';
    	//return view('pages.about')->with('name', $name);
// 		return view('pages.about')->with([
// 				'first' => 'Mai',
// 				'last' => 'Havela',
// 		]);
// 		$data = [];
// 		$data['first'] = 'Maiu';
// 		$data['last'] = 'Hvl';
// 		return view('pages.about', $data);
    	$first = 'Mailen';
    	$last = 'Magali';
    	return view('pages.about', compact('first', 'last'));
    }
    
    public function contact(){
    	return view('pages.contact');
    }
}
