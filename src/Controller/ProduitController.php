<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Entity\Marque;
use App\Entity\Produit;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
class ProduitController extends AbstractController
{
    /**
     * @Route("/produit", name="produit")
     */
    public function index()
    {

        $repository = $this->getDoctrine()->getRepository(Produit::class);


        $products = $repository->findBy( array (), array () , $limit = 9, $offset = 0);

//        dump($products);
//        die();


        return $this->render('produit/index.html.twig', [
            'products' => $products,
        ]);
    }





    /**
     * @Route("/detailproduit", name="detailproduit")
     */
    public function detailproduit()
    {

//        $repository = $this->getDoctrine()->getRepository(Produit::class);
//
//
//        $products = $repository->findBy( array (), array () , $limit = 9, $offset = 0);

//        dump($products);
//        die();


        return $this->render('accueiluser/detailsproduit.twig', [

        ]);
    }

    /**
     * @Route("/addmarque", name="addmarque")
     */
    public function addmarque(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
$marque = new Marque();


      $nommarque = $request->request->get("marquenom");

        $marque->setNomMarque($nommarque);
        $entityManager->persist($marque);


        $entityManager->flush();

        return $this->redirectToRoute('ajoutproduit');
    }


    /**
     * @Route("/addcategorie", name="addcategorie")
     */
    public function addcategorie(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $categorie = new Categorie();


        $nomcategorie = $request->request->get("categorienom");

        $categorie->setNomCategorie($nomcategorie);
        $entityManager->persist($categorie);


        $entityManager->flush();




//        dump($product );
//        die();
        return $this->redirectToRoute('ajoutproduit');
    }


    /**
     * @Route("/nouveauproduit", name="nouveauproduit")
     */
    public function nouveauproduit(Request $request)
    {

        $entityManager = $this->getDoctrine()->getManager();
        $produit = new Produit();

        $categorienom = $request->request->get('categorie');
        $marquenom = $request->request->get('marque');


        $repository = $this->getDoctrine()->getRepository(Categorie::class);


        $categorie = $repository->findOneBy(array('NomCategorie' => $categorienom));

        $repository = $this->getDoctrine()->getRepository(Marque::class);


        $marque = $repository->findOneBy(array('nomMarque' => $marquenom));



        $name = $request->request->get('name');


        $prix = $request->request->get('prix');
        $quantite = $request->request->get('quantite');

        $description = $request->request->get('description');

        $date = new \DateTime();



        $produit->setNom($name);
        $produit->setCategorie($categorie);
        $produit->setMarque($marque);
        $produit->setPrix($prix);
        $produit->setQuantite($quantite);
        $produit->setDescription($description);
        $produit->setDateCreation($date);

        $entityManager->persist($produit);


        $entityManager->flush();






//        dump($product );
//        die();
        return $this->redirectToRoute('ajoutproduit');
    }


    /**
     * @Route("/listforadmin", name="listforadmin")
     */
    public function listforadmin()
    {

        $repository = $this->getDoctrine()->getRepository(Produit::class);


        $products = $repository->findAll();

//        dump($products);
//        die();


        return $this->render('produit/listproduitAdmin', [
            'products' => $products,
        ]);
    }




    /**
     * @Route("/ajoutproduit", name="ajoutproduit")
     */
    public function ajoutproduit()
    {


        $repository = $this->getDoctrine()->getRepository(Categorie::class);


        $categories = $repository->findAll( );
        $repository = $this->getDoctrine()->getRepository(Marque::class);


        $marque = $repository->findAll( );

        return $this->render('produit/Ajoutproduit', [
            'categories' => $categories,
            'marque' => $marque,
        ]);
    }









}
