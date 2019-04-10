<?php
use PHPUnit\Framework\TestCase;
 class courseClassTester  extends TestCase
{
  public function testCalPriorityNoChildren ()
	{
    $preReqs = null; $coReqs = null; $credits = 3; $passed = false; $engProfReq = false;
    $course1 = new Course ("COURSE_1", $preReqs, $coReqs, $credits, $passed, $engProfReq);
    $course2 = new Course ("COURSE_2", $preReqs, $coReqs, $credits, $passed, $engProfReq);

    $courses = array ($course1, $course2);

    updateAllPriority($courses);

    $course1Priority = $course1->getPriority();
    $course2Priority = $course2->getPriority();

    $this->assertEquals($course1Priority,0);
    $this->assertEquals($course2Priority,0);
  }

  public function testCalPriorityOneChild ()
	{
    $preReqs = null; $coReqs = null; $credits = 3; $passed = false; $engProfReq = false;
    $course1 = new Course ("COURSE_1", $preReqs, $coReqs, $credits, $passed, $engProfReq);
    $preReqs = array($course1);
    $course2 = new Course ("COURSE_2", $preReqs, $coReqs, $credits, $passed, $engProfReq);

    $courses = array ($course1, $course2);

    updateAllPriority($courses);

    $course1Priority = $course1->getPriority();
    $course2Priority = $course2->getPriority();

    $this->assertEquals($course1Priority, -1);
    $this->assertEquals($course2Priority,0);
  }

  public function testCalPriorityTwoChild ()
	{
    $preReqs = null; $coReqs = null; $credits = 3; $passed = false; $engProfReq = false;
    $course1 = new Course ("COURSE_1", $preReqs, $coReqs, $credits, $passed, $engProfReq);
    $preReqs = array($course1);
    $course2 = new Course ("COURSE_2", $preReqs, $coReqs, $credits, $passed, $engProfReq);
    $preReqs = array($course1);
    $course3 = new Course ("COURSE_3", $preReqs, $coReqs, $credits, $passed, $engProfReq);

    $courses = array ($course1, $course2, $course3);

    updateAllPriority($courses);

    $course1Priority = $course1->getPriority();
    $course2Priority = $course2->getPriority();
    $course3Priority = $course3->getPriority();

    $this->assertEquals($course1Priority, -2);
    $this->assertEquals($course2Priority,0);
    $this->assertEquals($course3Priority,0);

  }

  public function testCalPriorityTwoGens ()
  {
    $preReqs = null; $coReqs = null; $credits = 3; $passed = false; $engProfReq = false;
    $course1 = new Course ("COURSE_1", $preReqs, $coReqs, $credits, $passed, $engProfReq);
    $preReqs = array($course1);
    $course2 = new Course ("COURSE_2", $preReqs, $coReqs, $credits, $passed, $engProfReq);
    $preReqs = array($course2);
    $course3 = new Course ("COURSE_3", $preReqs, $coReqs, $credits, $passed, $engProfReq);

    $courses = array ($course1, $course2, $course3);

    updateAllPriority($courses);

    $course1Priority = $course1->getPriority();
    $course2Priority = $course2->getPriority();
    $course3Priority = $course3->getPriority();

    $this->assertEquals($course1Priority,-2);
    $this->assertEquals($course2Priority,-1);
    $this->assertEquals($course3Priority, 0);

  }

  public function testCalPrioritySpecial ()
  {
    $preReqs = null; $coReqs = null; $credits = 3; $passed = false; $engProfReq = false;
    $course1 = new Course ("COURSE_1", $preReqs, $coReqs, $credits, $passed, $engProfReq);
    $preReqs = array($course1);
    $course2 = new Course ("COURSE_2", $preReqs, $coReqs, $credits, $passed, $engProfReq);
    $preReqs = array($course1);
    $course3 = new Course ("COURSE_3", $preReqs, $coReqs, $credits, $passed, $engProfReq);
    $preReqs = array($course2, $course3);
    $course4 = new Course ("COURSE_4", $preReqs, $coReqs, $credits, $passed, $engProfReq);

    $courses = array ($course1, $course2, $course3, $course4);

    updateAllPriority($courses);

    $course1Priority = $course1->getPriority();
    $course2Priority = $course2->getPriority();
    $course3Priority = $course3->getPriority();
    $course4Priority = $course4->getPriority();

    $this->assertEquals($course1Priority,-4);
    $this->assertEquals($course2Priority,-1);
    $this->assertEquals($course3Priority,-1);
    $this->assertEquals($course4Priority, 0);
  }

  public function testCoReqsNOTSatisfied ()
  {
    $preReqs = null; $coReqs = null; $credits = 3; $passed = false; $engProfReq = false;
    $course1 = new Course ("COURSE_1", $preReqs, $coReqs, $credits, $passed, $engProfReq);
    $coReqs = array ($course1);
    $course2 = new Course ("COURSE_2", $preReqs, $coReqs, $credits, $passed, $engProfReq);

    $semesterCourses = array ($course2);

    $this->assertFalse(coReqsSatisfied($semesterCourses));
  }

  public function testCoReqsSatisfiedPassed ()
  {
    $preReqs = null; $coReqs = null; $credits = 3; $passed = true; $engProfReq = false;
    $course1 = new Course ("COURSE_1", $preReqs, $coReqs, $credits, $passed, $engProfReq);
    $coReqs = array ($course1);
    $course2 = new Course ("COURSE_2", $preReqs, $coReqs, $credits, $passed, $engProfReq);

    $semesterCourses = array ($course1, $course2);

    $this->assertTrue(coReqsSatisfied($semesterCourses));
  }

  public function testCoReqsSatisfiedSameSem ()
  {
    $preReqs = null; $coReqs = null; $credits = 3; $passed = false; $engProfReq = false;
    $course1 = new Course ("COURSE_1", $preReqs, $coReqs, $credits, $passed, $engProfReq);
    $coReqs = array ($course1);
    $course2 = new Course ("COURSE_2", $preReqs, $coReqs, $credits, $passed, $engProfReq);

    $semesterCourses = array ($course1, $course2);

    $this->assertTrue(coReqsSatisfied($semesterCourses));
  }

}
?>
