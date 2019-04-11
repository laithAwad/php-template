<?php
use PHPUnit\Framework\TestCase;

 class DBInterface extends TestCase
{
	//getUntakenCourse($email) test
	public function testCorrectEmailGetUntakenCourses ()
	{
		//make sure you have a valid email in your db
		$userEmail = "hani-111-222@hotmail.com";
		$untakenCourse = getUntakenCourses($userEmail);

		$this->assertTrue(is_array($untakenCourse));
	}

	public function testWrongEmailGetUntakenCourses ()
	{
		$userEmail = "NonExistingEmail";
		$untakenCourse = getUntakenCourses($userEmail);

		$this->assertFalse(is_array($untakenCourse));
	}

	//updateTakenCourses($email,$coursesName) test
	public function testCorrectEmailUpdateTakenCourses ()
	{
		//make sure you have a valid email in your db & that user didn't take the course
		$userEmail = "hani-111-222@hotmail.com";
		$course = "COMP249";

		$this->assertTrue(updateTakenCourses($userEmail,$course));
	}

	public function testWrongEmailUpdateTakenCourses ()
	{
		$userEmail = "NonExistingEmail";
		$course = "COMP249";

		$this->assertFalse(updateTakenCourses($userEmail,$course));
	}

	public function testTakenCourseUpdateTakenCourses ()
	{
		//make sure you have a valid email in your db $ the course is taken by the same user
		$userEmail = "hani-111-222@hotmail.com";
		$course = "COMP249";

		$this->assertFalse(updateTakenCourses($userEmail,$course));
	}

	#getInputtedPassed($email) test
	public function testValidEmailGetInputtedPassed()
	{
		//make sure you have a valid email in your db
		$userEmail = "hani-111-222@hotmail.com";

		$this->assertTrue(!is_null(getInputtedPassed($userEmail)));
	}

	public function testValidEmailGetInputtedNotPassed()
	{
		//make sure you have a valid email in your db
		$userEmail = "NonExistingEmail";

		$this->assertFalse(!is_null(getInputtedPassed($userEmail)));
	}

	//getFirstSemester($email) test
	public function testValidEmailGetFirstSemester()
	{
		//make sure you have a valid email in your db
		$userEmail = "hani-111-222@hotmail.com";

		$this->assertTrue(!is_null(getFirstSemester($userEmail)));
	}

	public function testValidEmailGetFirstSemester()
	{
		//make sure you have a valid email in your db
		$userEmail = "NonExistingEmail";

		$this->assertFalse(!is_null(getFirstSemester($userEmail)));
	}

	//changeemail($email,$username) test
	public function testNonEmailExistChangeemail()
	{
		//make sure you have a valid $username in your db & the $newEmail doesn't exist in the db
		$newEmail = "NonExistingEmail";
		$username = "Hani Sabsoob";

		$this->assertTrue(changeemail($email,$username));
	}

	public function testInvalidUserNameChangeemail()
	{
		//make sure you have a valid $username in your db & the $newEmail exists in the db
		$newEmail = "hani-111-222@hotmail.com";
		$username = "Hani Sabsoob";

		$this->assertFalse(changeemail($email,$username));
	}


}
?>
