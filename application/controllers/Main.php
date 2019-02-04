<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	function __construct() {
			parent::__construct();
			// Load user model
			$this->load->model('User');//model for facebook login
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
			$answersmatchbox = array(
				0 => 'welcometocryptux',//changed from start -- real one
				1 => 'vidya',
				2 => 'ubuntu',
				3 => 'fossers',
				4 => 'vyvidh',
				5 => 'larryewing',
				6 => 'gcc',
				7 => 'helsinki',
				8 => 'helloworld',
				9 => 'mit',
				10 => 'linuxmint',
				11 => 'alexandraelbakyan',
				12 => 'gnupg',
				13 => 'wikisangamotsavam',
				14 => 'icecat',
				15 => 'ciaimperialproject',
				16 => 'susecon',
				17 => 'qt',
				18 => 'celestia',
				19 => 'frederickrussellburnham',
				20 => 'bushfires',
				21 => 'prime',
				22 => 'vilhjalmureinarsson',
				23 => 'goandfindher',
				24 => 'sparta',
				25 => '142108',
				26 => 'alansbombe',
				27 => 'house',
				28 => 'ephemeral',
				29 => '9fbd71a08014ed541ecad7d993b710659e871621',
				30 => 'archdukerudolph'
			 //key3 => value3,
		);

		$viewsmatchbox = array(
			//0 => 'gameyettostart',//changed from start -- real one
			0 => 'level_0',
			1 => 'level_1',
			2 => 'level_2',
			3 => 'level_3',
			4 => 'level_4',
			5 => 'level_5',
			6 => 'level_6',
			7 => 'level_7',
			8 => 'level_8',
			9 => 'level_9',
			10 => 'level_10',
			11 => 'level_11',
			12 => 'level_12',
			13 => 'level_13',
			14 => 'level_14',
			15 => 'level_15',
			16 => 'level_16',
			17 => 'level_17',
			18 => 'level_18',
			19 => 'level_19',
			20 => 'level_20',
			21 => 'level_21',
			22 => 'level_22',
			23 => 'stegan',
			24 => 'level_penlast',
			25 => 'level_last',
			26 => 'mulabhadra',
			27 => 'kcipher',
			28 => 'evilzone2',
			29 => 'beethoven',
			30 => 'theend'
		);

		$fakeanswersmatchbox = array(
			1 => 'targus',
			2 => 'tonto',
			//3 => 'fakeanswer3',
			//4 => 'fakeanswer4',

			11 => 'fakeanswer11',
			12 => 'fakeanswer12',
			13 => 'fakeanswer13',
			14 => 'fakeanswer14'
		);

		$fakeviewsmatchbox = array(
			1 => 'favi',
			2 => 'fakeview2',
			//3 => 'fakeview3',
			//4 => 'fakeview4',

			11 => 'fakeview11',
			12 => 'fakeview12',
			13 => 'fakeview13',
			14 => 'fakeview14'
		);

		$totalnumberoflevels = 30;//important -- update here always.
		$fakesets = 1; //important never change this value even if you add more fakesets

		$json = '{"starttime":"2019-02-01 00:00:00", "endtime":"2019-02-08 12:00:00"}';
		//var_dump(json_decode($json, true));
		$obj = json_decode($json);
		//if else ladder -- start
		if (date("Y-m-d H:i:s") < $obj->starttime)
		{
			if($this->session->userdata('userData')){
				if($this->uri->segment(1) == "welcometocryptex")
				{
					$this->load->view('templates/header');
					$this->load->view('menu2');
					$this->load->view('levels/gameyettostart');
					$this->load->view('templates/footer');
				}else {
					redirect(base_url().welcometocryptex);
				}
			}
			else {
				if($this->uri->segment(1) == "")
				{
					$this->load->view('main');
				}else {
					redirect(base_url());
				}
			}
		}
		else if(date("Y-m-d H:i:s")>=$obj->starttime&&date("Y-m-d H:i:s")<=$obj->endtime)
		{	if($this->session->userdata('fakeLevel')==0)
			{
				//if in game state -- start
				if($this->session->userdata('userData')){
						if($fakeanswersmatchbox[1]==$this->uri->segment(1) && $this->session->userdata('fakeLevel') == '0'){
							$this->session->set_userdata('fakeLevel',1);
							redirect(base_url().$fakeanswersmatchbox[1]);
						}
						else if($fakeanswersmatchbox[11]==$this->uri->segment(1) && $this->session->userdata('fakeLevel') == '0'){
							$this->session->set_userdata('fakeLevel',11);
							redirect(base_url().$fakeanswersmatchbox[11]);
						}
						else if($this->User->returnLevel($this->session->userdata['userData']['id']) == $totalnumberoflevels){
							$this->load->view('templates/header');
							$this->load->view('menu2');
							$this->load->view('/levels/theend');
							$this->load->view('templates/footer');
							$this->session->set_userdata('fakeLevel','0');
						}
						else if($answersmatchbox[$this->User->returnLevel($this->session->userdata['userData']['id'])] == $this->uri->segment(1)){
							$this->load->view('templates/header');
							$this->load->view('menu2');
							$this->load->view('/levels/'.$viewsmatchbox[$this->User->returnLevel($this->session->userdata['userData']['id'])]);
							$this->load->view('answerbox', [
								'level' => $this->User->returnLevel($this->session->userdata['userData']['id'])
							]);
							$this->load->view('templates/footer');
							$this->session->set_userdata('fakeLevel','0');
					}
						else if($answersmatchbox[$this->User->returnLevel($this->session->userdata['userData']['id'])+1] == $this->uri->segment(1)){
							$this->load->view('templates/header');
							$this->load->view('menu2');
							$this->load->view('/levels/'.$viewsmatchbox[$this->User->returnLevel($this->session->userdata['userData']['id'])+1]);
							$this->User->addLevel($this->session->userdata['userData']['id']);
							if($this->User->returnLevel($this->session->userdata['userData']['id']) == $totalnumberoflevels){
								$this->load->view('levels/theend');
							}
							$this->load->view('templates/footer');
							$this->session->set_userdata('fakeLevel','0');
				}else{
						//$this->load->view('main');

						redirect(base_url().$answersmatchbox[$this->User->returnLevel($this->session->userdata['userData']['id'])]);
				}}
				else {
					if($this->uri->segment(1) == "")
					{
						$this->load->view('main');
					}else {
						redirect(base_url());
					}
				}
				//if in game state -- end
			}
			else {
				if($fakeanswersmatchbox[$this->session->userdata('fakeLevel')+1]){//fake level reached a temporary end
				if($this->session->userdata('fakeLevel')+1 == $fakesets)
				{
					$this->session->set_userdata('fakeLevel','0');
					redirect(base_url());
				}
				else if($fakeanswersmatchbox[$this->session->userdata('fakeLevel')+1] == $this->uri->segment(1)){
					$this->load->view('templates/header');
					$this->load->view('menu2');
					$this->load->view('/levels/fakelevels/'.$fakeviewsmatchbox[$this->session->userdata('fakeLevel')+1]);
					$this->load->view('templates/footer');
					$this->session->set_userdata('fakeLevel',$this->session->userdata('fakeLevel')+1);
				}
				else if($fakeanswersmatchbox[$this->session->userdata('fakeLevel')] == $this->uri->segment(1)){
					$this->load->view('templates/header');
					$this->load->view('menu2');
					$this->load->view('/levels/fakelevels/'.$fakeviewsmatchbox[$this->session->userdata('fakeLevel')]);
					$this->load->view('templates/footer');
			}
			else{
				redirect(base_url().$fakeanswersmatchbox[$this->session->userdata('fakeLevel')]);
			}
		}else{
				//$this->load->view('main');
				$this->session->set_userdata('fakeLevel','0');
				redirect(base_url().$answersmatchbox[$this->User->returnLevel($this->session->userdata['userData']['id'])]);
		}
			}
		}
		else {
		if($this->session->userdata('userData')){
			if($this->uri->segment(1) == "theend")
			{
				$this->load->view('templates/header');
				$this->load->view('menu2');
				$this->load->view('endofgame');
				$this->load->view('templates/footer');
			}else {
				redirect(base_url().theend);
			}
		}
		else {
			if($this->uri->segment(1) == "")
			{
				$this->load->view('main');
			}else {
				redirect(base_url());
			}
		}
		}
		//if else ladder -- end
		//$arr = array('setting' => $setting, 'time' => $time);
		//echo json_encode($arr);
	}
}
