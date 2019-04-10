<?php
//require "/src/Session.php";
use PHPUnit\Framework\TestCase;
//require_once __DIR__.'/../src/Session.php';

 class sessionClassTester  extends TestCase
{
  public function testNoConflictExists ()
	{
		$s1 = new Session(null, null, null, "Fall", array ("T", "F"), 90000, 100000, null);
		$s2 = new Session(null, null, null, "Fall", array ("M", "W"), 90000, 100000, null);

		$this->assertFalse(conflictExists($s1,$s2));
	}

	public function testConflictExistsCompleteOverlap ()
	{
		$s1 = new Session(null, null, null, "Fall", array ("M", "W"), 90000, 100000, null);
		$s2 = new Session(null, null, null, "Fall", array ("M", "W"), 90000, 100000, null);

		$this->assertTrue(conflictExists($s1,$s2));
	}

  public function testConflictExistsOverlapAtLeftSide ()
 {
   $s1 = new Session(null, null, null, "Fall", array ("M", "W"), 80000, 93000, null);
   $s2 = new Session(null, null, null, "Fall", array ("M", "W"), 90000, 100000, null);

   $this->assertTrue(conflictExists($s1,$s2));
 }

 public function testConflictExistsOverlapAtRightSide ()
{
  $s1 = new Session(null, null, null, "Fall", array ("M", "W"), 93000, 103000, null);
  $s2 = new Session(null, null, null, "Fall", array ("M", "W"), 90000, 100000, null);

  $this->assertTrue(conflictExists($s1,$s2));
}

public function testConflictExistsOverlapOneDay ()
{
 $s1 = new Session(null, null, null, "Fall", array ("M"), 93000, 103000, null);
 $s2 = new Session(null, null, null, "Fall", array ("M", "W"), 90000, 100000, null);

 $this->assertTrue(conflictExists($s1,$s2));
}

}
?>
