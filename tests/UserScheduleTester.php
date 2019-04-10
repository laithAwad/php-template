<?php

use PHPUnit\Framework\TestCase;


 class genProgramSchedChecker extends TestCase
{
	public function testProgramSchedCorrect ()
	{
  //  $userName, $email, $userSchedule, $firstSemester
    $Us = new UserSchedule(null, null);
		$s1 = new User("userName", "", $Us, "Fall");
		//$s2 = new Session(null, null, null, "Fall", array ("M", "W"), 90000, 100000, null);
    $lOs = $Us->getListOfSemesters();
		$this->assertGreaterThan(genProgramSched ($s1), 0);
	}
/*
	public function testNoConflictExists ()
	{
		$s1 = new Session(null, null, null, "Fall", array ("T", "F"), 90000, 100000, null);
		$s2 = new Session(null, null, null, "Fall", array ("M", "W"), 90000, 100000, null);

		$this->assertFalse(conflictExists($s1,$s2));
	}
*/

}
?>
