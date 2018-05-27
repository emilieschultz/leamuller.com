<?php

namespace App\Form\Type;

use App\Form\Model\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class ContactType
 * @package App\Form\Type
 */
class ContactType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class, [
                'label' => 'contact_form.label.firstname',
            ])
            ->add('lastname', TextType::class, [
                'label' => 'contact_form.label.lastname',
            ])
            ->add('email', TextType::class, [
                'label' => 'contact_form.label.email',
            ])
            ->add('phoneNumber', TextType::class, [
                'label' => 'contact_form.label.phone_number',
            ])
            ->add('message', TextareaType::class, [
                'label' => 'contact_form.label.message',
            ])
            ->add('images', CollectionType::class, [
                'label' => 'contact_form.label.images',
                'entry_type' => FileType::class,
                'allow_add' => true,
                'entry_options' => [
                    'label' => false,
                    'constraints' => [
                        new Assert\File([
                            'maxSize' => '4M',
                        ]),
                    ]
                ],
                'by_reference' => false,
            ]);
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefault('data_class', Contact::class);
    }

}
