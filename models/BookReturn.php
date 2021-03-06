<?php

/**
 * 此 BookReturn 模型 不关联任何数据表
 * 只负责为 BookReturnController 提供数据处理
 */

namespace app\models;

use yii\base\Model;
use yii\db\Query;

use app\models\Reader;
use app\models\ReaderType;
use app\models\BookBorrow;


class  BookReturn extends Model
{

	public $renewSecond = 5184000;


	/*
	 * 接收 $readerNumber ，放进 reader 数据表中查找。
	 * @param resource $connect  数据库连接
	 * @param string  $readerNumber 存放读者编号
	 * @return array 返回读者信息
	 */
	public function getReaderInfo(  $connect, $readerNumber )
	{
		$readerTableName     = Reader::tableName();	
		$readerTypeTableName = ReaderType::tableName();

		$sql = "SELECT `PK_readerID`, `readerName`, `readerNumber`, 
					   `readerCertificate`, `readerCertificateNumber`, `readerTypeName`,
					   `readerTypeBorrowNumber` 
				FROM $readerTableName JOIN $readerTypeTableName 
				ON FK_readerTypeID = PK_readerTypeID 
				WHERE readerNumber = $readerNumber";
		$query = $connect -> createCommand( $sql ) -> queryOne();
		
		return $query;
	}




	/*
	 * 根据读者 ID, 查询出他借了什么书
	 * 
	 * @param resource $connect 数据库连接
	 * @param string  $readerID 存放读者编号
	 * @return array 返回读者信息
	 */
	public function getBorrowInfo( $connect, $readerID )
	{
		$borrowTableName    = BookBorrow::tableName();
		$bookInfoTableName  = BookInfo::tableName();
		$bookRelsTableName  = BookRelationship::tableName();
		$bookshelfTableName = Bookshelf::tableName();

		$query = new Query;
		$query  -> select('bw.PK_borrowID, bi.bookInfoBookName, bf.bookshelfName, bw.borrowBeginTimestamp, bw.borrowReturnTimestamp, bw.borrowIsReturn ')
				-> from( $borrowTableName . ' AS bw')	
				-> where(['FK_readerID' => $readerID ])
				-> join('INNER JOIN', $bookInfoTableName . ' AS bi', 'bw.FK_bookInfoID = bi.PK_bookInfoID' )
				-> join('INNER JOIN', $bookRelsTableName . ' AS brp', 'bw.FK_bookInfoID = brp.FK_bookInfoID' )
				-> join('INNER JOIN', $bookshelfTableName . ' AS bf', 'brp.FK_bookshelfID = bf.PK_bookshelfID' )
				-> orderBy('borrowIsReturn ASC, borrowBeginTimestamp DESC');

		return $query;
	}


	/**
	 * 图书续借功能
	 * @param int $borrowID 借阅的数据ID
	 * @return boolean 续借成功与否
	 */
	public function renew( $borrowID )
	{
		$borrow = BookBorrow::findOne( $borrowID );

		if( $borrow -> borrowIsReturn == 1 ){
			// 本书早已归还，无需续借。
			return 2;	
		}

		$endTime = $borrow->borrowReturnTimestamp;
		$borrow -> borrowReturnTimestamp = $endTime + $this->renewSecond;
		if ( $borrow -> save() ){
			return 1;	
		}
	}
	

	public function returnBook( $borrowID )
	{
		$borrow	= BookBorrow::findOne( $borrowID );
		if( $borrow -> borrowIsReturn == 1){
			// 本书早已归还，无需重复归还
			return 2;	
		}

		$borrow -> borrowIsReturn = 1;
		if( $borrow -> save() ){
			// 归还成功
			return 1;	
		}
		
	}



}




?>
