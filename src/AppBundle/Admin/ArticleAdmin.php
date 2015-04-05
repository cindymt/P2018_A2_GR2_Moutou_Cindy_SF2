<?php


namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class ArticleAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title')
            ->add('content', 'ckeditor', [
                'config' => [
                    'toolbar' => [
                        [
                            'name'  => 'document',
                            'items' => ['Source', '-','Save', 'NewPage', 'DocProps', 'Preview', 'Print', '-', 'Templates'],
                        ],
                        [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ],
                        [ 'Find','Replace','-','SelectAll','-','SpellChecker', 'Scayt' ],
                        '/',
                        [
                            'name'  => 'basicstyles',
                            'items' => ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat'],
                        ],
                        [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl' ],
                        '/',
                        [ 'Styles','Format','Font','FontSize' ],
                    ],
                    'uiColor' => '#ffffff',
                ],
                'label' => 'Contenu :',
            ])
            ->add('picture', null, [
                'required'=>false,
            ])
            ->add('user', null, [
                'required'=>true,
            ])
            ->add('category')
            ->add('tag')
            ->add('enabled', null, [
                'label' => 'Activer :',
                'required' => false,
            ])

        ;

    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title')
            ->add('user')
            ->add('category')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title')
            ->add('category')
            ->add('user')
            ->add('enabled')
            ->add('id')
        ;
    }
}