<?php

namespace App\Controller;

use App\Entity\Album;
use App\Entity\Cart;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends AbstractController
{
    #[Route('/cart/{id_album}', name: 'app_cart')]
    public function app_cart(int $id_album, EntityManagerInterface $em): Response
    {
        $user = $this->getUser();
        $album = $em -> getRepository(Album::class) -> find($id_album);
        if(!$album) {
            throw $this->createNotFoundException('No album found'.$id_album);
            
        }
        $cart = new Cart();
        $cart -> setUser($user);
        $cart -> setAlbum($album);
        $cart -> setCreatedAt(new \DateTimeImmutable());
        $em->persist($cart);
        $em->flush();
        return $this->redirectToRoute('app_album_index');
    }
}
