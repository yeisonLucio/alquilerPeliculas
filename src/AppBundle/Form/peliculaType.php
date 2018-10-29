<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class peliculaType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nombre')
                ->add('fecha_lanzamiento')
                ->add('duracion')
                ->add('sipnosis')
                ->add('estreno')
                ->add('calidad')
                ->add('genero')
                ->add('usuario_id', EntityType::class, array(
                'class' => 'AppBundle:usuario',
                'choice_label' => 'username',
                'multiple' => TRUE));

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
