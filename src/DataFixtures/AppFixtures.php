<?php

namespace App\DataFixtures;

use App\Entity\MicroPost;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $manager->persist($this->newMicroPost("Welcome to Italy!", "Welcome to Italy!"));
        $manager->persist($this->newMicroPost("Welcome to US!", "Welcome to US!"));
        $manager->persist($this->newMicroPost("Welcome to Germany!", "Welcome to Germany!"));

        $manager->flush();
    }

    private function newMicroPost(string $title, string $description): MicroPost
    {
        $microPost = new MicroPost();
        $microPost->setTitle($title)
            ->setText($description)
            ->setCreated(new DateTime());
        return $microPost;
    }
}
