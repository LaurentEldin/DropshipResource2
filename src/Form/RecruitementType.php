<?php

namespace App\Form;

use App\Entity\Recruitement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class RecruitementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label'=>'Nom'
            ])
            ->add('surname', TextType::class, [
                'label'=>'Prénom'
            ])
            ->add('mail', EmailType::class, [
                'label'=>'eMail'
            ])
            ->add('phone', TextType::class, [
                'label'=>'Téléphone'
            ])
            ->add('message', TextareaType::class,[
               'label'=>'Message'
            ])
            ->add('document', FileType::class, [
                "mapped" => false,
                "label" => "Uploadez votre document",
                "required" => false,
                'constraints' => [
                    new File([
                        'maxSize' => '10M',
                        'mimeTypes' => [
                            'application/pdf',
                        ],
                        'mimeTypesMessage' => "Seul le format pdf est accepté",
                    ])
                ],
            ])
            ->add('envoyer', SubmitType::class, ['label'=>'Envoyer']);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Recruitement::class,
        ]);
    }
}
