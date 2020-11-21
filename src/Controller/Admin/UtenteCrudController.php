<?php

namespace App\Controller\Admin;

use App\Entity\Utente;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class UtenteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Utente::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
