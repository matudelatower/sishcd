<?php

namespace App\Controller;

use App\Entity\Mocion;
use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AdminController extends EasyAdminController {

	private $passwordEncoder;

	public function __construct( UserPasswordEncoderInterface $passwordEncoder ) {
		$this->passwordEncoder = $passwordEncoder;
	}

//	public function createNewUsuarioEntity() {
//		return $this->get( 'fos_user.user_manager' )->createUser();
//	}
//
//	public function updateUsuarioEntity( $user ) {
//		$this->get( 'fos_user.user_manager' )->updateUser( $user, false );
//		parent::updateEntity( $user );
//	}
//
	public function persistUsuarioEntity( $user ) {
//		$this->get( 'fos_user.user_manager' )->updateUser( $user, false );
		$user->setPassword( $this->passwordEncoder->encodePassword(
			$user,
			$this->request->get( 'usuario' )['plainPassword']
		) );
		parent::persistEntity( $user );
	}

//
	public function updateUsuarioEntity( $user ) {
//		$this->get( 'fos_user.user_manager' )->updateUser( $user, false );
		$user->setPassword( $this->passwordEncoder->encodePassword(
			$user,
			$this->request->get( 'usuario' )['plainPassword']
		) );
		parent::updateEntity( $user );

	}

	public function removeMocionEntity() {

		$em = $this->em;
		// change the properties of the given entity and save the changes
		$id     = $this->request->query->get( 'id' );
		$entity = $em->getRepository( Mocion::class )->find( $id );

		foreach ( $entity->getVotos() as $voto ) {
			$votacion = $voto->getVotacion();
			$voto->setVotacion( null );
			$em->remove( $voto );
			$em->remove( $votacion );
		}

		foreach ( $entity->getVotaciones() as $votacion ) {
			$em->remove( $votacion );
		}

		$em->remove( $entity );


		$this->em->flush();

		// redirect to the 'list' view of the given entity ...
		return $this->redirectToRoute( 'easyadmin',
			[
				'action' => 'list',
				'entity' => $this->request->query->get( 'entity' ),
			] );
	}
}
