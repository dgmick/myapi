<?php


namespace App\Entity;


interface UserInterface extends \Symfony\Component\Security\Core\User\UserInterface
{
    public function getFirstName();
    public function setFirstName(string $firstName);
    public function getLastName();
    public function setLastName(string $lastName);
    public function getCreatedAt();
    public function setCreatedAt(\DateTimeInterface $createdAt);
    public function getEmail();
    public function setEmail(string $email);
}
