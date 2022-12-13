<?php namespace App\Controllers;

class Menu extends BaseController
{
	
	public function menu_admin(){
    if(session()->get('level')<>1){
      return redirect()->to(base_url('home/user'));
    }
    return view('user/v_menu');
	}

	public function menu_kondektur(){
    if(session()->get('level')<>2){
      return redirect()->to(base_url('home/user'));
    }
    return view('user/v_kondektur');
	}

	public function menu_pengunjung(){
    if(session()->get('level')<>3){
      return redirect()->to(base_url('home/user'));
    }
    return view('user/v_pengunjung');
	}

}
