<?php

namespace App\Controller;

use App\Entity\Proveedor;
use App\Form\AddProveedorType;
use App\Form\DeleteProveedorType;
use App\Form\EditProveedorType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use function PHPUnit\Framework\isEmpty;

class ProveedorController extends AbstractController
{
    /**
     * @Route("/", name="app_proveedor")
     */
    public function index(): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $proveedores = $entityManager->getRepository(Proveedor::class)->findAll();
        return $this->render('proveedor/index.html.twig', array('proveedores_list'=>$proveedores));
    }

    /**
     * @Route("/edit-proveedor/{id}", name="edit_proveedor")
     */
    public function editProveedores(Request $request, $id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $proveedor = $entityManager->getRepository(Proveedor::class)->find($id);
        $form = $this->createForm(EditProveedorType::class,$proveedor);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $proveedor = $form ->getData();
            $proveedor->setUpdateDate();
            $entityManager->persist($proveedor);
            $entityManager->flush();
            return $this->redirectToRoute('app_proveedor');
        }
        return $this->render('proveedor/editProveedor.html.twig', array('form'=>$form->createView()));
    }


    /**
     * @Route("/delete-proveedor/{id}", name="delete_proveedor")
     */
    public function deleteProveedores(Request $request, $id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $proveedor = $entityManager->getRepository(Proveedor::class)->find($id);
        $form = $this->createForm(deleteProveedorType::class,$proveedor);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $proveedor = $entityManager ->remove($proveedor);
            $entityManager->flush();
            return $this->redirectToRoute('app_proveedor');
        }
        return $this->render('proveedor/deleteProveedor.html.twig', array('form'=>$form->createView(),
            'name'=>$proveedor->getName()));
    }

    /**
     * @Route("/add-proveedor/", name="add_proveedor")
     */
    public function addProveedores(Request $request): Response
    {

        $entityManager = $this->getDoctrine()->getManager();
        $proveedor = new Proveedor();
        $form = $this->createForm(AddProveedorType::class,$proveedor);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $proveedor = $form ->getData();
            $entityManager->persist($proveedor);
            $entityManager->flush();
            return $this->redirectToRoute('app_proveedor');
        }

        return $this->render('proveedor/addProveedor.html.twig',array('form'=>$form->createView()));
    }
}
