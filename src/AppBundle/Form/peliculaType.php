<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use AppBundle\Entity\usuario;

class peliculaType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //$usuario = new usuario();
        $builder->add('nombre')
                ->add('fechaLanzamiento')
                ->add('duracion')
                ->add('sinopsis')
                ->add('estreno')
                ->add('calidad')
                ->add('genero');
                

    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\pelicula'
        ));
    }

   /**
   * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_pelicula';
    }


}
