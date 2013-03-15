<?php
/**
 * FileName: 	comment.php
 * Summary:		faq
 * Author:		DingRen
 */
 class comment
 {
 	private  $db; //mysql object
 	
 	/**
 	 * initialize database object
 	 *
 	 * @param object $db database object
 	 * @return pic
 	 */
 	function comment($db)
 	{
 		$this->db=$db;
 	}
 	
 	/**
 	 * list faq
 	 *
 	 * @return array faq
 	 */
 	function list_faq()
 	{
 		$sql = "SELECT * FROM dr_faq";
 		return $this->db->fetch_all($sql);
 	}
 	
 	/**
 	 * insert question
 	 * 
 	 * @return int question intert id
 	 */
 	function insert_content($question)
 	{
 		$date = date('Y/m/d');
 		$sql = "INSERT INTO dr_faq SET
 		question = '{$question}',
 		answer = '',
 		thedate = '{$date}'";
 		
 		$this->db->query($sql);
 		return $this->db->insert_id();
 	}
 	
 	/**
 	 * anwser the question
 	 * 
 	 * @return int answer insert id
 	 */
	 function answer_content($commentlist,$id)
 	{
 		$sql = "UPDATE dr_faq SET 
 		question = '{$commentlist['question']}',
 		answer = '{$commentlist['answer']}'
 		WHERE id = '{$id}'";
 		
 		$this->db->query($sql);
 		return $this->db->insert_id();
 	}
 	
 	/**
 	 * drop the faq
 	 * 
 	 * @return int faq drop id
 	 */
 	function drop_content($dropID)
 	{
 		$sql ="delete from dr_faq where id ={$dropID}";	 
 		$this->db->query($sql);
 		return $this->db->insert_id();
 	}
 }

 ?>
