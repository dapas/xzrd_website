<?php
/**
 * FileName: 	login.class.php
 * Summary:		login check
 * Author:		DingRen
 */
 class login
 {
 	private  $db; //mysql object
 	
 	/**
 	 * login
 	 *
 	 * @param object $db
 	 * @return login
 	 */
 	function login($db)
 	{
 		$this->db=$db;
 	}
 	
 	/**
 	 * list_admin
 	 *
 	 * @return array admin's user name and password
 	 */
 	function list_admin()
 	{
 		$sql = "SELECT * FROM dr_admin";
 		return $this->db->fetch_all($sql);
 	}
 	
    /**
 	 * login_check_admin
 	 * 
 	 * @param array post admin
 	 * 
 	 * @return int 1 if user name and password mathched;
 	 * 			   0 otherwise.
 	 */
 	function login_check_admin($loginlist)
 	{
 		//user name and password should be numbers or characters,
 		//the length is between 1 to 16
 		if(!preg_match('/^[a-zA-Z0-9]{1,16}$/', $loginlist['usr']) 
 			|| !preg_match('/^[a-zA-Z0-9]{1,16}$/', $loginlist['passwd']) ) {
 			return 0;
 		}
 		
 		$sql = "select * from dr_admin where usr = '{$loginlist['usr']}' limit 1";
 		$result = $this->db->fetch_first($sql);
 		//user name does not match
 		if (empty($result)) {
 			return 0;
 		}
 		
		if($result['passwd'] == $loginlist['passwd'])
 		{
 			return 1;
		}
		else 
		{
			return 0;
		}
 	}
 
 	/**
 	 * login_change
 	 * 
 	 * @param array new admin
 	 * 
 	 * @return int admin insert id
 	 */
 	 function login_change($loginlist)
 	{
 		$sql = "UPDATE dr_admin SET usr = '{$loginlist['usr']}', passwd = '{$loginlist['passwd']}' limit 1";
 		$this->db->query($sql);
 		return $this->db->insert_id();
 	}
 }
 ?>
