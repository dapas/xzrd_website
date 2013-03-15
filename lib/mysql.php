<?php

class mysql 
{
private $host     = "";			//mysqlä¸»æœºå��
	private $user     = "";			//mysqlç”¨æˆ·å��
	private $pwd      = "";			//mysqlå¯†ç �
	private $dbName   = "";			//mysqlæ•°æ�®åº“å��ç§°
	private $linkID   = 0;			//ç”¨æ�¥ä¿�å­˜è¿žæŽ¥ID
	private $queryID  = 0;			//ç”¨æ�¥ä¿�å­˜æŸ¥è¯¢ID
	private $fetchMode= MYSQL_ASSOC;//å�–è®°å½•æ—¶çš„æ¨¡å¼�
	private $errorMessage    = "";			//mysqlå‡ºé”™ä¿¡æ�¯
	private $record   = array();	//ä¸€æ�¡è®°å½•æ•°ç»„

	//======================================
	// å‡½æ•°: mysql()
	// åŠŸèƒ½: æž„é€ å‡½æ•°
	// å�‚æ•°: å�‚æ•°ç±»çš„å�˜é‡�å®šä¹‰
	// è¯´æ˜Ž: æž„é€ å‡½æ•°å°†è‡ªåŠ¨è¿žæŽ¥æ•°æ�®åº“
	//      å¦‚æžœæƒ³æ‰‹åŠ¨è¿žæŽ¥åŽ»æŽ‰è¿žæŽ¥å‡½æ•°
	//======================================
	function __construct($host,$user,$pwd,$dbName)
	{	if(empty($host) || empty($user) || empty($dbName))
			$this->errorMessage = "æ•°æ�®åº“ä¸»æœºåœ°å�€,ç”¨æˆ·å��æˆ–æ•°æ�®åº“å��ç§°ä¸�å®Œå…¨,è¯·æ£€æŸ¥!";
		$this->host    = $host;
		$this->user    = $user;
		$this->pwd     = $pwd;
		$this->dbName  = $dbName;
		$this->connect();//è®¾ç½®ä¸ºè‡ªåŠ¨è¿žæŽ¥
	}
	//======================================
	// å‡½æ•°: connect($host,$user,$pwd,$dbName)
	// åŠŸèƒ½: è¿žæŽ¥æ•°æ�®åº“
	// å�‚æ•°: $host ä¸»æœºå��, $user ç”¨æˆ·å��
	// å�‚æ•°: $pwd å¯†ç �, $dbName æ•°æ�®åº“å��ç§°
	// è¿”å›ž: 0:å¤±è´¥
		// è¯´æ˜Ž: é»˜è®¤ä½¿ç”¨ç±»ä¸­å�˜é‡�çš„åˆ�å§‹å€¼
	//======================================
	function connect($host = "", $user = "", $pwd = "", $dbName = "")
	{
		if ("" == $host)
			$host = $this->host;
		if ("" == $user)
			$user = $this->user;
		if ("" == $pwd)
			$pwd = $this->pwd;
		if ("" == $dbName)
			$dbName = $this->dbName;
		//now connect to the database
		$this->linkID = mysql_connect($host, $user, $pwd);
		if (!$this->linkID)
		{
			$this->errorMessage = mysql_error();
			$this->errorLoging($this->errorMessage);
		
		}
		if (!mysql_select_db($dbName, $this->linkID))
		{
			$this->errorMessage = mysql_error();
			$this->errorLoging($this->errorMessage);
	
		}
                $this->query("set names utf8");
		return $this->linkID;			
	}
	//======================================
	// å‡½æ•°: query($sql)
	// åŠŸèƒ½: æ•°æ�®æŸ¥è¯¢
	// å�‚æ•°: $sql è¦�æŸ¥è¯¢çš„SQLè¯­å�¥
	// è¿”å›ž: 0:å¤±è´¥
	//======================================
	function query($sql)
	{
		//echo "query,$sql<br>\n";
		$this->queryID = mysql_query($sql, $this->linkID);
		if (!$this->queryID)
		{	
			$this->errorMessage = mysql_error() . "\tSQL is:{$sql}.";
			$this->errorLoging($this->errorMessage);
		}
		return $this->queryID;
	}
	//======================================
	// å‡½æ•°: set_fetch_mode($mode)
	// åŠŸèƒ½: è®¾ç½®å�–å¾—è®°å½•çš„æ¨¡å¼�
	// å�‚æ•°: $mode æ¨¡å¼� MYSQL_ASSOC, MYSQL_NUM, MYSQL_BOTH
	// è¿”å›ž: 0:å¤±è´¥
	//======================================
	function set_fetch_mode($mode)
	{
		if ($mode == MYSQL_ASSOC || $mode == MYSQL_NUM || $mode == MYSQL_BOTH) 
		{
			$this->fetchMode = $mode;
			return true;
		}
		else
		{
			$this->errorLoging("setFetchModeé”™è¯¯çš„æ¨¡å¼�:$mode.");
			return false;
		}
	}
	//======================================
	// å‡½æ•°: fetchRow()
	// åŠŸèƒ½: ä»Žè®°å½•é›†ä¸­å�–å‡ºä¸€æ�¡è®°å½•
	// è¿”å›ž: 0: å‡ºé”™ record: ä¸€æ�¡è®°å½•
	//======================================
	function fetch_row()
	{
		$this->record = mysql_fetch_array($this->queryID,$this->fetchMode);
		return $this->record;
	}
	//======================================
	// å‡½æ•°: fetchAll()
	// åŠŸèƒ½: ä»Žè®°å½•é›†ä¸­å�–å‡ºæ‰€æœ‰è®°å½•
	// è¿”å›ž: è®°å½•é›†æ•°ç»„
	//======================================
	function fetch_all($sql)
	{
		$this->query($sql);
		$arr = array();
		while($this->record = mysql_fetch_array($this->queryID,$this->fetchMode))
		{
			$arr[] = $this->record;
		}
		mysql_free_result($this->queryID);
		return $arr;
	}
	//======================================
	// å‡½æ•°: getValue()
	// åŠŸèƒ½: è¿”å›žè®°å½•ä¸­æŒ‡å®šå­—æ®µçš„æ•°æ�®
	// å�‚æ•°: $field å­—æ®µå��æˆ–å­—æ®µç´¢å¼•
	// è¿”å›ž: æŒ‡å®šå­—æ®µçš„å€¼
	//======================================
	function get_value($field)
	{
		return $this->record[$field];
	}
	
	/**
	 * ç›´æŽ¥èŽ·å¾—ç¬¬ä¸€æ�¡è®°å½•
	 * @author hugo
	 * @param string $sql æŸ¥è¯¢è¯­å�¥
	 * @return array ä¸€æ�¡è®°å½•
	 */
	function fetch_first($sql)
	{
		$this->query($sql);
		return $this->fetch_row();
	}
	
	/**
	 * èŽ·å¾—ç¬¬ä¸€æ�¡è®°å½•çš„ç¬¬ä¸€ä¸ªå­—æ®µå��
	 * @author  hugo
	 * @param string $sql æŸ¥è¯¢è¯­å�¥
	 * @return string å­—æ®µçš„å€¼
	 */
	function result_first($sql)
	{
			$this->query($sql);
			(array)$result = mysql_fetch_array($this->queryID,MYSQL_NUM);
			return $result[0];
	}
	
	
	//======================================
	// å‡½æ•°: affectedRows()
	// åŠŸèƒ½: è¿”å›žå½±å“�çš„è®°å½•æ•°
	//======================================
	function affected_rows()
	{
		return mysql_affected_rows($this->linkID);
	}
	//======================================
	// å‡½æ•°: recordCount()
	// åŠŸèƒ½: è¿”å›žæŸ¥è¯¢è®°å½•çš„æ€»æ•°
	// å�‚æ•°: æ— 
	// è¿”å›ž: è®°å½•æ€»æ•°
	//======================================
	function record_count()
	{
		return mysql_num_rows($this->queryID);
	}

	//======================================
	// å‡½æ•°: getVersion()
	// åŠŸèƒ½: è¿”å›žmysqlçš„ç‰ˆæœ¬
	// å�‚æ•°: æ— 
	//======================================
	function get_version() 
	{
		$this->query("select version() as ver");
		$this->fetch_row();
		return $this->get_value("ver");
	}
	//======================================
	// å‡½æ•°: getDBSize($dbName, $tblPrefix=null)
	// åŠŸèƒ½: è¿”å›žæ•°æ�®åº“å� ç”¨ç©ºé—´å¤§å°�
	// å�‚æ•°: $dbName æ•°æ�®åº“å��
	// å�‚æ•°: $tblPrefix è¡¨çš„å‰�ç¼€,å�¯é€‰
	//======================================
	function get_DB_size($dbName, $tblPrefix=null) 
	{
		$sql = "SHOW TABLE STATUS FROM " . $dbName;
		if($tblPrefix != null) {
			$sql .= " LIKE '$tblPrefix%'";
		}
		$this->query($sql);
		$size = 0;
		while($this->fetch_row())
			$size += $this->get_value("Data_length") + $this->get_value("Index_length");
		return $size;
	}
	//======================================
	// å‡½æ•°: insert_ID()
	// åŠŸèƒ½: è¿”å›žæœ€å�Žä¸€æ¬¡æ�’å…¥çš„è‡ªå¢žID
	// å�‚æ•°: æ— 
	//======================================
	function insert_id()
	{
		return mysql_insert_id($this->linkID);
	}
	
	//===========================
	//å‡½æ•°ï¼š errorLoging
	//åŠŸèƒ½ï¼š	write error to file
	//å�‚æ•°ï¼š	$e
	//è¿”å›žï¼š	null
	//===========================
	protected function errorLoging($errorMessage)
	{
		//é”™è¯¯è®°å½•æ ¼å¼�ï¼š 2008-06-19 $errorMessage;
		$date = date("y-m-d h:i:s");
		$fp = @fopen('error.log',"a");
		@fwrite($fp,$date . "\t" . $errorMessage . "\r\n");
		@fclose($fp);
	}
}
?>
