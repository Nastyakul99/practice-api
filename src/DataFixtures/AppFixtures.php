<?php
namespace App\DataFixtures;

use App\Entity\Worker;
use App\Entity\Locr;
use App\Entity\Time;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
     $i=0;
     $workers=[];
        while ($i < 7) {
            $workers[$i] = new Worker();
            $workers[$i]->setName('name '.$i);
            $workers[$i]->setSurname('surname '.$i);
            $workers[$i]->setEmail('email'.$i);
            $manager->persist($workers[$i]);
            $i++;
        }
///////////////////
     $i=0;
     $times=[];
        while ($i < 4) {
            $times[$i] = new Time();
            $times[$i]->setYear(2019);
            $times[$i]->setQuarter($i+1);
            $manager->persist($times[$i]);
            $i++;
        }
        while ($i < 8) {
            $times[$i] = new Time();
            $times[$i]->setYear(2020);
            $times[$i]->setQuarter($i-3);
            $manager->persist($times[$i]);
            $i++;
        }
///////////////////////////
     $i=0;
     $locrs=[];
        while ($i < 7) {
          for ($j = 0; $j < 8; $j++) {
          $locrs[$i] = new Locr();
          $locrs[$i]->setFile('file '.$i);
          $locrs[$i]->setStatistics(mt_rand(10, 100));
          $locrs[$i]->setMark(mt_rand(10, 100));
          $locrs[$i]->setWorker($workers[$i]);
          $locrs[$i]->setTime($times[$j]);
          $manager->persist($locrs[$i]);
           }
         
          $i++;
        }
        $manager->flush();
    }
}
