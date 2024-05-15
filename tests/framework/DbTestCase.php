<?php
/* --------------------------------------------------------------
   DbTestCase.inc.php 2018-08-01
   Gambio GmbH
   http://www.gambio.de
   Copyright (c) 2018 Gambio GmbH
   Released under the GNU General Public License (Version 2)
   [http://www.gnu.org/licenses/gpl-2.0.html]
   --------------------------------------------------------------
*/

namespace Gambio\AdminFeed\Tests;

use Gambio\AdminFeed\Tests\TestsConfig;
use PHPUnit\DbUnit\TestCaseTrait;
use PHPUnit\Framework\TestCase;

/**
 * Class DbTestCase
 *
 * @package Gambio\AdminFeed\Tests\Cases
 */
abstract class DbTestCase extends TestCase
{
	use TestCaseTrait;
	
	/**
	 * @var \PHPUnit\DbUnit\Database\Connection
	 */
	private $connection;
	
	/**
	 * @var \PDO
	 */
	protected static $pdo;
	
	/**
	 * @var \CI_DB_query_builder
	 */
	private static $ciDb;
	
	/**
	 * @var \CI_DB_utility
	 */
	private static $ciDbUtils;
	
	/**
	 * @var \CI_DB_forge
	 */
	private static $ciDbForge;
	
	/**
	 * @var string
	 */
	private static $restoreSqlFile;
	
	/**
	 * @var array
	 */
	protected static $exportedTables = [];
	
	
	/**
	 * Returns the db connection for this test case.
	 *
	 * @return \PHPUnit\DbUnit\Database\Connection
	 */
	final public function getConnection()
	{
		if($this->connection === null)
		{
			$this->connection = $this->createDefaultDBConnection(static::getPdo(), TestsConfig::DB_NAME);
		}
		
		return $this->connection;
	}
	
	
	/**
	 * @return \PDO
	 */
	final public static function getPdo()
	{
		if(static::$pdo === null)
		{
			static::$pdo = new \PDO('mysql:host=' . TestsConfig::DB_HOST . ';dbname=' . TestsConfig::DB_NAME,
			                        TestsConfig::DB_USER, TestsConfig::DB_PASSWORD);
			static::$pdo->exec('SET NAMES utf8');
			static::$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_WARNING);
		}
		
		return static::$pdo;
	}
	
	
	/**
	 * @param array $seedData
	 */
	protected static function seedArrayDataSet(array $seedData)
	{
		foreach($seedData as $table => $tableData)
		{
			static::getPdo()->query('TRUNCATE `' . $table . '`');
			foreach($tableData as $tableDataSet)
			{
				$columns = array_keys($tableDataSet);
				$query   = 'INSERT INTO `' . $table . '` (`' . implode('`, `', $columns) . '`) VALUES (:'
				           . implode(', :', $columns) . ')';
				
				$stmt = static::getPdo()->prepare($query);
				
				$result = $stmt->execute($tableDataSet);
			}
		}
	}
	
	
	/**
	 * Export current database to provided file path.
	 *
	 * Before starting messing with the database it would be useful to export the current
	 * database state and import it after the tests are finished. This method will save an
	 * SQL dump file of the current state of the database.
	 *
	 * Important:
	 *      This method requires mysql to be install on the machine that is going to execute this script!
	 *
	 * Example:
	 *      $this->exportDatabase(__DIR__ . '/backup.sql', array('customers', 'customers_info');
	 *
	 * @param string $filename File path of the mysql dump file.
	 * @param array  $tables   (optional) Must contain the table names that need to export, if omitted
	 *                         then all the database will be exported.
	 *
	 * @throws \Exception If there is an error or a warning during the export operation.
	 * @throws \InvalidArgumentException If $filename argument is not a string.
	 */
	final public static function exportDatabase($filename, array $tables = []): void
	{
		if(!is_string($filename) || empty($filename))
		{
			throw new \InvalidArgumentException('Invalid argument provided: ' . print_r($filename, true));
		}
		
		// Save the exported file for later reference (will be restored if an error occurs).
		self::$restoreSqlFile = $filename;
		
		// Save the exported tables array for further reference in the child classes.
		self::$exportedTables = $tables;
		
		set_error_handler([self::class, 'restoreDatabaseOnError']);
		
		$dbUtility = self::getCiDbUtility();
		
		$preferences = ['tables' => $tables, 'format' => 'txt'];
		
		file_put_contents($filename, $dbUtility->backup($preferences));
	}
	
	
	/**
	 * Import SQL dump file into the database.
	 *
	 * After the tests are finished the database will have to be cleaned up in order to
	 * remove the changes introduced by the test methods. Use this method to import a
	 * specific SQL dump file into the database.
	 *
	 * Important:
	 *      This method requires mysql to be install on the machine that is going to execute
	 *      this script!
	 *
	 * Example:
	 *      $this->importDatabase(__DIR__ . '/backup.sql');
	 *
	 * @param string $filename      File path of the mysql dump file.
	 * @param bool   $deleteSqlFile (optional) Whether to delete the sql file after a successful import.
	 *
	 * @throws \UnexpectedValueException If there is an error or a warning during the import operation.
	 * @throws \InvalidArgumentException If the dump file could not be found.
	 */
	final public static function importDatabase($filename, $deleteSqlFile = false): void
	{
		if(!is_string($filename) || empty($filename) || !file_exists($filename))
		{
			throw new \InvalidArgumentException('Invalid argument provided or file could not be found $filename: '
			                                    . print_r($filename, true));
		}
		
		$db      = self::getCiDbQueryBuilder();
		$queries = explode(";\n", file_get_contents($filename));
		
		$db->query('SET FOREIGN_KEY_CHECKS = 0');
		foreach($queries as $query)
		{
			if(empty($query) || $query === "\n" || $query === "\n\n" || $query === "\n\n\n")
			{
				continue;
			}
			
			$query = str_replace('0000-00-00 00:00:00', '1000-01-01 00:00:00', $query); // MySQL Strict Mode fix.
			$db->query($query);
		}
		$db->query('SET FOREIGN_KEY_CHECKS = 1');
		
		if($deleteSqlFile)
		{
			@unlink($filename);
		}
		
		restore_error_handler();
	}
	
	
	/**
	 * Import the SQL file if an error is occurred.
	 *
	 * @param int    $number  PHP Error Number
	 * @param string $message PHP Error Message
	 * @param string $file    PHP Error File
	 * @param int    $line    PHP Error Line
	 *
	 * @throws \RuntimeException If "importDatabase" operation fails to complete successfully.
	 * @throws \InvalidArgumentException From "invalidArgumentTypeError" method.
	 * @throws \UnexpectedValueException From "importDatabase" method.
	 */
	final public static function restoreDatabaseOnError($number, $message, $file, $line): void
	{
		if(is_string(self::$restoreSqlFile) && !empty(self::$restoreSqlFile) && file_exists(self::$restoreSqlFile))
		{
			self::importDatabase(self::$restoreSqlFile);
			throw new \RuntimeException('There was an error in the executed test (' . $message
			                            . '), please check the execution stack (database imported successfully).');
		}
	}
	
	
	/**
	 * Get the CIDB connection string for the test classes.
	 *
	 * This method will return the connection string from the tests.config.inc.php credentials. Many tests require an
	 * extra database connection for their assertions.
	 *
	 * @return string Returns the CIDB connection string.
	 */
	final public static function getCiDbConnectionString()
	{
		return 'mysqli://' . TestsConfig::DB_USER . ':' . TestsConfig::DB_PASSWORD . '@' . TestsConfig::DB_HOST . '/'
		       . TestsConfig::DB_NAME;
	}
	
	
	/**
	 * Get an active CI_DB_query_builder instance.
	 *
	 * You can use this object to perform extra operations to the database or pass it to
	 * objects that require an active database connection.
	 *
	 * @return \CI_DB_query_builder Returns an active instance.
	 */
	final public static function getCiDbQueryBuilder()
	{
		if(self::$ciDb === null)
		{
			self::$ciDb = \CIDB(self::getCiDbConnectionString());
			self::$ciDb->query('SET SESSION sql_mode = ""');
		}
		
		return self::$ciDb;
	}
	
	
	/**
	 * Get an active CI_DB_utility instance.
	 *
	 * You can use this object to perform various utility operations to the connected database
	 * such as creating a backup.
	 *
	 * @return \CI_DB_utility Returns an active instance.
	 */
	final public static function getCiDbUtility()
	{
		if(self::$ciDbUtils === null)
		{
			self::$ciDbUtils = \CIDBUtils(self::getCiDbConnectionString());
		}
		
		return self::$ciDbUtils;
	}
	
	
	/**
	 * Get an active CI_DB_forge instance.
	 *
	 * You can use this object to perform various structuring operations to a database such as adding
	 * tables, adding, modifying or removing columns.
	 *
	 * @return \CI_DB_forge Returns an active instance.
	 */
	final public static function getCiDbForge()
	{
		if(self::$ciDbForge === null)
		{
			self::$ciDbForge = \CIDBForge(self::getCiDbConnectionString());
		}
		
		return self::$ciDbForge;
	}
}