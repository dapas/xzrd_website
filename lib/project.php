<?php
/**
 * FileName: 	project.php
 * Summary:		company project
 * Author:		DingRen
 */
 class project
 {
 	private  $db; //mysql object
 	
 	/**
 	 * initialize database object
 	 *
 	 * @param object $db database object
 	 * @return pic
 	 */
 	function project($db)
 	{
 		$this->db=$db;
 	}
 	
 	/**
 	 * list company project
 	 *
 	 * @return array project information
 	 */
 	function list_project()
 	{
 		$sql = "SELECT * FROM dr_project";
 		return $this->db->fetch_all($sql);
 	}
 	
 	/**
 	 * insert_project
 	 * 
 	 * @param array new project
 	 * 
 	 * @return int new project insert id
 	 * 
 	 */
 	function insert_project($projectList)
 	{
 		$sql = "INSERT INTO dr_project SET 
 		title = '{$projectList['title']}',
 		content = '{$projectList['content']}'";
 		
 		$this->db->query($sql);
 		return $this->db->insert_id();
 	}
 	
  	/**
 	 * drop_project
 	 * 
 	 * @param int drop id
 	 * 
 	 * @return int project drop id
 	 */
 	function drop_project($dropID)
 	{
 		$sql ="delete from dr_project where id ={$dropID}";	 
 		$this->db->query($sql);
 		return $this->db->insert_id();
 	}
 }

 ?>
