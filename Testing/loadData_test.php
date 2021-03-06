<?php

    require_once(dirname(__FILE__) . '/simpletest/autorun.php');
    require_once('../classes/database.php');

    class TestDatabase extends UnitTestCase {

        // NOTE:
        //      Some tests use assertTrue instead of assertEqual when checking for a number.
        //      This is due to the fact that some genres will always be subgenres of a larger genre (all rom coms are comedies)
        
        function testDatabaseConnection() {
            $test = new Database();
            $this->assertTrue($test->connect());
        }

        function testFilmInDatabase() {
            $test = new Database();
            $test->connect();

            $this->assertTrue($test->filmInDatabase("11 Blocks"));
            $this->assertTrue($test->filmInDatabase("Super"));
            $this->assertTrue($test->filmInDatabase("Hansel"));
            $this->assertTrue($test->filmInDatabase("Grease"));

            $this->assertFalse($test->filmInDatabase("Gerbel MC: Compton"));
            $this->assertFalse($test->filmInDatabase("This is not a movie"));
            $this->assertFalse($test->filmInDatabase("Half-Life 3"));
            $this->assertFalse($test->filmInDatabase("Turkey Sandwich: Raw And Uncut"));
        }

        function testGetFilmID() {
            $test = new Database();
            $test->connect();
            
            $this->assertTrue("1", $test->getFilmID("11 Blocks"));
            $this->assertTrue("300", $test->getFilmID("Dragon Lord"));
            $this->assertTrue("452", $test->getFilmID("13 Assassins"));
        }

        function testActionAdventureGenreID() {
            $test = new Database(); 
            $test->connect(); 

            $this->assertTrue("1", $test->getGenreID("Kung Fury"));
            $this->assertNotEqual("2", $test->getGenreID("Ip Man"));
        }

        function testAnimeGenreID() {
            $test = new Database(); 
            $test->connect(); 

            $this->assertTrue("2", $test->getGenreID("Mazinkaiser SKL"));
            $this->assertNotEqual("2", $test->getGenreID("I Robot"));
        }

        function testChildrenAndFamilyGenreID() {
            $test = new Database(); 
            $test->connect(); 

            $this->assertTrue("3", $test->getGenreID("Dumbo"));
            $this->assertNotEqual("3", $test->getGenreID("HALO Legends"));
        
        }

        function testClassicGenreID() {
            $test = new Database(); 
            $test->connect(); 

            $this->assertTrue("4", $test->getGenreID("Julia"));
            $this->assertNotEqual("4", $test->getGenreID("Kite"));
             
        }

        function testComedyGenreID() {
            $test = new Database(); 
            $test->connect(); 

            $this->assertTrue("5", $test->getGenreID("Gigli"));
            $this->assertNotEqual("5", $test->getGenreID("All About Eve"));
             
        }

        function testRomanticComedyGenreID() {
            $test = new Database(); 
            $test->connect(); 

            $this->assertTrue("6", $test->getGenreID("Take Me Home"));
            $this->assertNotEqual("6", $test->getGenreID("Grease"));
             
        }
        
        function testDarkComedyGenreID() {
            $test = new Database(); 
            $test->connect(); 

            $this->assertTrue("7", $test->getGenreID("Super"));
            $this->assertNotEqual("7", $test->getGenreID("Chandler"));
             
        }

        function testDramaGenreID() {
            $test = new Database(); 
            $test->connect(); 

            $this->assertTrue("8", $test->getGenreID("Jump"));
            $this->assertNotEqual("8", $test->getGenreID("Dark Horse"));
             
        }

        function testHorrorGenreID() {
            $test = new Database(); 
            $test->connect(); 

            $this->assertTrue("9", $test->getGenreID("Hell"));
            $this->assertNotEqual("9", $test->getGenreID("La-La Land"));
             
        }

        function testIndependentGenreID() {
            $test = new Database(); 
            $test->connect(); 

            $this->assertTrue("10", $test->getGenreID("360"));
            $this->assertNotEqual("10", $test->getGenreID("Hansel"));
             
        }

        function testInternationalGenreID() {
            $test = new Database(); 
            $test->connect(); 

            $this->assertTrue("11", $test->getGenreID("Amelie"));
            $this->assertNotEqual("11", $test->getGenreID("Rocky"));
             
        }

        function testMusicGenreID() {
            $test = new Database(); 
            $test->connect(); 

            $this->assertTrue("12", $test->getGenreID("Grease"));
            $this->assertNotEqual("12", $test->getGenreID("Amber Alert"));
             
        }

        function testRomanticGenreID() {
            $test = new Database(); 
            $test->connect(); 

            $this->assertTrue("13", $test->getGenreID(""));
            $this->assertNotEqual("13", $test->getGenreID("Amber Alert"));
             
        }
    }

?>
