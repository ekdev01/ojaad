<?php

namespace EK\OjaadBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;

class VolunteerType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        /** @var \Symfony\Component\Translation\Translator $trans */
        $trans = $options['translator'];

        $builder
            ->add('name', TextType::class, array('attr' => array(
                'placeholder' => $trans->trans('form.pholder.fname')),
                'constraints' => array(
                    new NotBlank(array("message" => $trans->trans('error.name'))),
                )
            ))
            ->add('email', EmailType::class, array('attr'  => array(
                'placeholder' => $trans->trans('form.pholder.email')),
                'constraints' => array(
                    new NotBlank(array("message" => $trans->trans('error.email.a'))),
                    new Email(array("message" => $trans->trans('error.email.b'))),
                ),
            ))
            ->add('cover', TextareaType::class, array('attr'  => array(
                'placeholder' => $trans->trans('aform.pholder1')),
                'constraints' => array(
                    new NotBlank(array("message" => $trans->trans('form.msg.error1'))),
                ),
            ))
            ->add('cvfile', FileType::class, array(
                'constraints' => array(
                    new NotBlank(array("message" => $trans->trans('form.msg.error1'))),
                    new File(array(
                        'maxSize' => '1024k',
                        'mimeTypes' => array(
                            'application/pdf',
                            'application/msword',
                            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                            'application/x-pdf',
                            'application/x-msword',
                            'application/vnd.ms-word',
                        ),
                        'maxSizeMessage' => (string) $trans->trans('form.msg.error6'),
                        'mimeTypesMessage' => (string) $trans->trans('form.msg.error4'),
                    ))
                ),
            ));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setRequired('translator');
        $resolver->setDefaults(array(
            'data_class' => 'EK\OjaadBundle\Entity\Volunteer'
        ));
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function setDefaultOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'error_bubbling' => true
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'ek_ojaadbundle_volunteer';
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'volunteer_form';
    }
}
