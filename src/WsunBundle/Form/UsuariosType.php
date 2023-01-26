<?php

namespace WsunBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\FormEvents;
class UsuariosType extends AbstractType
{
	
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
	
	 //$id_empresa=$builder->getData()->getDepartamento()->getIdEmpresa()->getId();  	 
	 $passwordOptions = array(
           'type'           => PasswordType::class,
		   'invalid_message' => 'Campos de Password no son iguales',
           'first_options'  => array('label' => 'Password'),
           'second_options' => array('label' => 'Repeat password'),
           'required'       => true,
        );
		$recordId = $options['data']->getId();
        if (!empty($recordId)) {
           $passwordOptions['required'] = false;
        }
		  
		$builder
                ->add('username',TextType::class,array('label'=>'Username: '))
                ->add('password',  RepeatedType::class, $passwordOptions)

              
                ->add('ruc',TextType::class,array('label'=>'Ruc: '))
                ->add('correo',TextType::class,array('label'=>'Correo: '))
           
		
                 ->add('user_roles', EntityType::class, array(
                'class'=> 'WsunBundle:Role',
                'multiple' => true, // Allow multiple selection
                'choice_label'=>'detalle')
                    );             
                
               // ->add('user_roles');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'WsunBundle\Entity\Usuarios',
			//'csrf_protection' => false,
			//'newUser'         => null,
			'validation_groups' => array('new')
        ))
		
		;
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'wsunbundle_usuarios';
    }


}
