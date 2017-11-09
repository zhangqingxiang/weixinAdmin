<?php
defined("BASEPATH") OR exit('No direct script access allowed');

class logger
{
	const LOG_PATH = '/www/admin/application/logs';
	static $errorfile = self::LOG_PATH . '/error.log';
	static $infofile  = self::LOG_PATH . '/info.log';
	static $debugfile = self::LOG_PATH . '/debug.log';
	static $dayfile   = self::LOG_PATH . '/daylog.log';
	static $moneyFile   = self::LOG_PATH . '/moneylog.log';
	static $expFile   = self::LOG_PATH . '/explog.log';
	static $memToDbFile   = self::LOG_PATH . '/memtodbLog.log';
	

	public static function Daylog($msg)
	{
		$now = time();
		$filename = self::$dayfile . '.' . date('Y-m-d', $now);
		$arr = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 1);
		$cfile = @basename( $arr[0]['file'] );
		$cline = @$arr[0]['line'];
		$dat = date('Y-m-d H:i:s', $now);
		
		self::Write($filename, $msg, $cfile, $cline, $dat);
	}

	public static function Moneylog($msg)
	{
		$now = time();
		$filename = self::$moneyFile . '.' . date('Y-m-d', $now);
		$arr = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 1);
		$cfile = @basename( $arr[0]['file'] );
		$cline = @$arr[0]['line'];
		$dat = date('Y-m-d H:i:s', $now);
		
		self::Write($filename, $msg, $cfile, $cline, $dat);
	}

	public static function Explog($msg)
	{
		$now = time();
		$filename = self::$expFile . '.' . date('Y-m-d', $now);
		$arr = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 1);
		$cfile = @basename( $arr[0]['file'] );
		$cline = @$arr[0]['line'];
		$dat = date('Y-m-d H:i:s', $now);
		
		self::Write($filename, $msg, $cfile, $cline, $dat);
	}

	public static function MemToDblog($msg)
	{
		$now = time();
		$filename = self::$memToDbFile;
		$arr = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 1);
		$cfile = @basename( $arr[0]['file'] );
		$cline = @$arr[0]['line'];
		$dat = date('Y-m-d H:i:s', $now);
		
		self::Write($filename, $msg, $cfile, $cline, $dat);
	}

	public static function logMsg($fileName, $msg)
	{
		$now = time();
		$filename = self::LOG_PATH.$fileName. '.' . date('Y-m-d', $now);;
		$arr = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 1);
		$cfile = @basename( $arr[0]['file'] );
		$cline = @$arr[0]['line'];
		$dat = date('Y-m-d H:i:s', $now);
		
		self::Write($filename, $msg, $cfile, $cline, $dat);
	}

//=======================================================================
	public static function Write($filename, $msg, $cfile, $cline, $dat)
	{
		// $clientip = FdData::$NowClientIP;
		$clientIP = isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : '';
		if( empty($clientIP) ){
			$clientIP = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER["REMOTE_ADDR"] : 'undefined';
		}else{
			$arr = explode(',', $clientIP);
			$clientIP = $arr[0];
		}
		$in = "[$dat][$clientIP][$cfile:$cline]$msg\n";
		return error_log( $in, 3, $filename );
	}

	public static function Error($msg)
	{
		$arr = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 1);
		$cfile = @basename( $arr[0]['file'] );
		$cline = @$arr[0]['line'];
		$dat = date('Y-m-d H:i:s');
		
		self::Write(self::$errorfile, $msg, $cfile, $cline, $dat);
	}

	public static function Info($msg)
	{
		$arr = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 1);
		$cfile = @basename( $arr[0]['file'] );
		$cline = @$arr[0]['line'];
		$dat = date('Y-m-d H:i:s');
		
		self::Write(self::$infofile, $msg, $cfile, $cline, $dat);
	}

	public static function Debug($msg)
	{
		$arr = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 1);
		$cfile = @basename( $arr[0]['file'] );
		$cline = @$arr[0]['line'];
		$dat = date('Y-m-d H:i:s');
		
		self::Write(self::$debugfile, $msg, $cfile, $cline, $dat);
	}

}
?>