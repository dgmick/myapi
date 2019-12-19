<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    /** @var UserPasswordEncoderInterface */
    protected $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        for ($u = 0; $u < 10; $u++) {
            $user = new User();

            $hash = $this->encoder->encodePassword($user, 'HelloWorld22');

            $user->setEmail($faker->email)
                ->setFirstName($faker->firstName)
                ->setLastName($faker->lastName)
                ->setCreatedAt($faker->dateTimeBetween('-6 months'))
                ->setPassword($hash)
                ->setRoles(['ROLE_USER']);
            $manager->persist($user);
        }
        $manager->flush();
    }
}
