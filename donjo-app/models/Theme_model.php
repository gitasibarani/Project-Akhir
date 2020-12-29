<?php class Theme_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	/*
	 * Tema sistem ada di subfolder themes/
	 * Tema buatan sistem ada di subfolder desa/themes/
	*/
	public function list_all()
	{
		$tema_sistem = glob('themes/*' , GLOB_ONLYDIR);
		$tema_desa = glob('desa/themes/*' , GLOB_ONLYDIR);
		$tema_semua = array_merge($tema_sistem, $tema_desa);
		$list_tema = array();
		foreach ($tema_semua as $tema){
			$list_tema[] = str_replace('themes/', '', $tema);
		}
		return $list_tema;
	}

	public function latar_website()
	{
		$ubahan = "desa/pengaturan/{$this->theme}/images/latar_website.jpg";
		$bawaan = "$this->theme_folder/$this->theme/assets/css/images/latar_website.jpg";
		$default = "assets/front/css/images/latar_website.jpg";
		$latar_website = is_file($ubahan) ? $ubahan : $bawaan;
		$latar_website = is_file($latar_website) ? $latar_website : $default;
		return $latar_website;
	}

	public function lokasi_latar_website()
	{
		return "desa/pengaturan/{$this->theme}/images/";
	}

	public function latar_login()
	{
		$ubahan = LATAR_LOGIN . "latar_login.jpg";
		$default = "assets/css/images/latar_login.jpg";
		$latar_login = is_file($ubahan) ? $ubahan : $default;
		return $latar_login;
	}

}
?>
