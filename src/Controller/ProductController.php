<?php

namespace App\Controller;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /**
     * @Route("/products", name="products", methods={"GET"})
     */
    public function add(EntityManagerInterface $manager): Response
    {
        $product = new Product();

        $product
            ->setName('test')
            ->setPrice(20);

        $manager->persist($product);
        $manager->flush();

        return new Response('Product added');
    }

    /**
     * @Route("/products/{id}", name="product", methods={"GET"})
     * @Template(vars={"product"})
     * @param Product $product
     */
    public function show(Product $product): void
    {
    }
}