<?php

namespace WebsiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ContatoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //->add('data', 'datetime', array('widget'=>'single_text', 'format'=>'dd/MM/yyyy H:i:s'))
            ->add('nome')
            ->add('email')
            ->add('telefone')
            ->add('celular')
            ->add('newsletter')
            ->add('mensagem')
            //->add('ip')
            //->add('localidade')
            //->add('dadosNavegador')
            //->add('historico')
            //->add('status', 'entity', array('class'=>'WebsiteBundle\Entity\ContatoTipoStatus','property'=>'nome'))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WebsiteBundle\Entity\Contato'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'wtis_contato';
    }
}
