<?php

namespace App\Form\DataTransformer;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\Form\DataTransformerInterface;
use function Symfony\Component\String\u;

class RoleArrayToStringTransformer implements DataTransformerInterface 
{
	private $roles;

	public function __construct(UserRepository $roles)
    {
        $this->roles = $roles;
    }

    public function transform($roles): string
    {
    	 return implode(',', $roles);
    }

    public function reverseTransform($string): array
    {
        if (null === $string || u($string)->isEmpty()) {
            return [];
        }

        $names = array_filter(array_unique(array_map('trim', u($string)->split(','))));

        
        $roles = $this->roles->findBy([
            'roles' => $roles,
        ]);
        $newRoles = array_diff($names, $roles);
        foreach ($newRoles as $role) {
            $role = new User();
            $tag->setRoles($role);
            $roles[] = $role;
        }

        return $roles;
    }
}