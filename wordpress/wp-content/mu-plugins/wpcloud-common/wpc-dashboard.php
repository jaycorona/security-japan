<?php
class WpcDashboard {
	private $pageinfo;
	private $pages;
	private $content;
	
	public function __construct() {
		if(basename($_SERVER["SCRIPT_NAME"]) == basename(__FILE__)) exit;
		
		$this->pageinfo = array(
				'page'			=> 'wpc-cpanel',
				'title'			=> 'WP Cloud'
			);
		
		// ******* 子ページの情報 *******
		// [新規追加方法]
		// 下の配列に追加後、pages の下に page と同じ名前の.phpファイルを置く
		$this->pages = array(
				array( 'page' => 'wpc-cpanel', 'title' => 'WP Cloud' ),
			);
		
		add_action( 'admin_menu', array(&$this, 'add_menu') );
		
		add_action( 'admin_enqueue_scripts', array(&$this, 'add_admin_style') );
		
		add_action( 'admin_menu' , array(&$this, 'add_separator') );
		
		add_action( 'admin_menu' , array(&$this, 'add_controlpanel_link') );
		
		add_action( 'admin_menu' , array(&$this, 'add_support_link') );

//		add_action( 'admin_menu' , array(&$this, 'add_news_link') );

		add_filter( 'custom_menu_order', array(&$this, 'custom_menu_order') );
		add_filter( 'menu_order', array(&$this, 'custom_menu_order') );
	}
	
	public function add_menu() {
		$page = add_menu_page( $this->pageinfo['title'], $this->pageinfo['title'], 8, $this->pageinfo['page'], array(&$this, 'read_page_content'), WPC_PLUGIN_URL.'/images/common/icon.png' );
		$this->create_submenu_page();
	}
	
	public function add_admin_style() {
		wp_enqueue_style( 'wpcloud_admin_menu', WPC_PLUGIN_URL . '/css/common/admin-menu.css', array(), WPC_PLUGIN_VERSION );
	}
	
	private function create_submenu_page() {
		foreach($this->pages as $line) {
			$page = add_submenu_page( $this->pageinfo['page'], $line['title'], $line['title'], 8, $line['page'], array(&$this, 'read_page_content') );
		}
	}
	
	public function add_style() {
		wp_enqueue_style( 'wpcloud_common_style', WPC_PLUGIN_URL . '/css/common/common.css' , array(), WPC_PLUGIN_VERSION );
	}
	
	public function read_page_content() {
		global $plugin_page;
		require_once plugin_dir_path(__FILE__) . 'pages/'.$plugin_page.'.php';
	}
	
	public function add_separator() {
		global $menu;
		$menu[] = array( '' , 'read', 'separator-gmo', '', 'wp-menu-separator' );
	}
	
	public function add_controlpanel_link() {
		global $submenu;
		$submenu[ $this->pageinfo['page'] ][] = array( 'Control Panel', 8, 'javascript:void(window.open("https://cp.wpcloud.jp/Login/DashBoard/"));', 'Control Panel' );
	}
	
	public function add_support_link() {
		global $submenu;
		$submenu[ $this->pageinfo['page'] ][] = array( 'Support', 8, 'javascript:void(window.open("http://support.wpcloud.jp"));', 'Support' );
	}
	
	public function add_news_link() {
		global $submenu;
		$submenu[ $this->pageinfo['page'] ][] = array( 'Themes&Plugins', 8, 'javascript:void(window.open("http://news.wpcloud.jp"));', 'Themes&Plugins' );
	}
	
	public function add_test_link() {
		global $wp_admin_bar;
		if ( !is_admin_bar_showing() ) return;

		$args = array(
			'id'    => 'site-name',
			'title' => $blog_details->blogname,
			'href'  => $blog_details->siteurl,
			'meta'  => array( 'class' => '' )
		);
		$wp_admin_bar->add_node( $args );
	}
	
	public function custom_menu_order($menu) {
		if( ! $menu ) return true;
		
		$menu = $this->menu_move_first('separator-gmo', $menu);
		$menu = $this->menu_move_first($this->pageinfo['page'], $menu);
		
		return $menu;
	}
	
	private function menu_move_first($name, $menu) {
		$num = array_search( $name, $menu );
		array_splice( $menu, $num, 1 );
		array_unshift( $menu, $name );
		
		return $menu;
	}
}