<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * PersonaRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PersonaRepository extends EntityRepository {
	public function getPersonaPorDni( $dni, $limit = 10, $returnArray = false ) {
		$qb = $this->createQueryBuilder( 'p' );
		$qb
			->where( "upper(p.dni) like upper(:dni)" );
		$qb->setParameter( 'dni', '%' . $dni . '%' );

		$qb->setMaxResults( $limit );

		if ( $returnArray ) {
			return $qb->getQuery()->getArrayResult();
		} else {
			return $qb->getQuery()->getResult();
		}
	}

	public function getQbAll(  ) {
		$qb = $this->createQueryBuilder( 'p' );
		return $qb;
	}

}
