<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixture extends Fixture
{
    private $passwordHasher;
    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }
    public function load(ObjectManager $manager): void
    {
        $user = new User();

        $password = 'root';
        $dateOfBirth = new \DateTime('1990-01-01');
        // Format the DateTime object as a string
        $formattedDateOfBirth = $dateOfBirth->format('Y-m-d');

        $user->setAddress('ALASKA Nº154 RUE 885')
            ->setCountry('MOROCCO')
            ->setDateOfBirth($formattedDateOfBirth)
            ->setEmail('root@gmail.com')
            ->setFirstName('root')
            ->setRoles(["ROLE_ADMIN"])
            ->setLastName('root')
            ->setPassword($this->passwordHasher->hashPassword($user, $password))
            ->setPhoneNumber('0615225879')
            ->setState('KENITRA')
            ->setZipCode('55100');

        $manager->persist($user);

        for ($i = 1; $i <= 8; $i++) {
            $user = new User();
            $user->setEmail("user$i@example.com");
            $user->setRoles(["ROLE_USER"]);
            $user->setPassword($this->passwordHasher->hashPassword($user, 'user123')); // Example hashed password
            $user->setFirstName("User$i");
            $user->setLastName("Doe");
            $user->setAddress("123 Main Street");
            $user->setDateOfBirth("1990-01-01");
            $user->setPhoneNumber("+1 (123) 456-7890");
            $user->setCountry("United States");
            $user->setState("California");
            $user->setZipCode("12345");

            $manager->persist($user);
        }
        
        $manager->flush();
    }
}
