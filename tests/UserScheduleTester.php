<?php

use PHPUnit\Framework\TestCase;


 class genProgramSchedChecker extends TestCase
{
	public function testProgramSchedCorrect ()
	{
  //  $userName, $email, $userSchedule, $firstSemester
    $userSchedule1 = new UserSchedule(null, null);
		$User1 = new User("userName", "test@t.com", $userSchedule1 , "Fall");
		//$s2 = new Session(null, null, null, "Fall", array ("M", "W"), 90000, 100000, null);
      $userSchedule1->genProgramSched($User1);
    $listOfSemester1 = $userSchedule1 -> getListOfSemesters();
		$this->assertGreaterThan(0, count($listOfSemester1));
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
