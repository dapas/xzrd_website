<?php
/**
 * FileName: 	profile.php
 * Summary:		company profile
 * Author:		DingRen
 */
 class profile
 {
 	private  $db; //mysql object
 	
 	/**
 	 * initialize database object
 	 *
 	 * @param object $db database object
 	 * @return pic
 	 */
 	function profile($db)
 	{
 		$this->db=$db;
 	}
 	
 	/**
 	 * list company information
 	 *
 	 * @return array company information
 	 */
 	function list_company()
 	{
 		$sql = "SELECT * FROM dr_profile";
 		return $this->db->fetch_all($sql);
 	}
 	
 	/**
 	 * update company information
 	 *
 	 * @param array new company profile
 	 *
 	 * @return array company information
 	 */
 	function update_company($profileList)
 	{
 		$sql = "UPDATE dr_profile SET content = '{$profileList['content']}', 
 		address = '{$profileList['address']}',
 		phone = '{$profileList['phone']}',
 		code = '{$profileList['code']}',
 		fax = '{$profileList['fax']}'";
 		return $this->db->fetch_all($sql);
 	}
 }

 ?>
