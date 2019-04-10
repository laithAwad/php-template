<?php

use PHPUnit\Framework\TestCase;


 class genProgramSchedChecker extends TestCase
{
	public function testProgramSchedCorrect ()
	{

    $userSchedule1 = new UserSchedule(null, null);
		$User1 = new User("userName", "test@t.com", $userSchedule1 , "Fall");
  
      $userSchedule1->genProgramSched($User1);
    $listOfSemester1 = $userSchedule1 -> getListOfSemesters();
		$this->assertGreaterThan(0, count($listOfSemester1));
	}

}
?>
