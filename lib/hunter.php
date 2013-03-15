<?php
/**
 * FileName: 	hunter.php
 * Summary:		job information
 * Author:		DingRen
 */
 class hunter
 {
 	private  $db; //mysql object
 	
 	/**
 	 * initialize database object
 	 *
 	 * @param object $db database object
 	 * @return pic
 	 */
 	function hunter($db)
 	{
 		$this->db=$db;
 	}
 	
 	/**
 	 * list job offer information
 	 *
 	 * @return array job information
 	 */
 	function list_jobs()
 	{
 		$sql = "SELECT * FROM dr_hunter";
 		return $this->db->fetch_all($sql);
 	}
 	
  	/**
 	 * insert jobs
 	 * 
 	 * @return int job information insert id
 	 */
 	function insert_job($jobList)
 	{
 		$sql = "INSERT INTO dr_hunter SET 
 		title = '{$jobList['title']}',
 		conditions = '{$jobList['conditions']}',
 		name = '{$jobList['name']}',
 		phone = '{$jobList['phone']}'";
 		
 		$this->db->query($sql);
 		return $this->db->insert_id();
 	}
 	
  	/**
 	 * drop the job
 	 * 
 	 * @return int job information drop id
 	 */
 	function drop_job($dropID)
 	{
 		$sql ="delete from dr_hunter where id ={$dropID}";	 
 		$this->db->query($sql);
 		return $this->db->insert_id();
 	}
 }
?>