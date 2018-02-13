<?php

namespace EK\OjaadBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class CompanyType extends AbstractType {
	/**
	 * {@inheritdoc}
	 */
	public function buildForm(FormBuilderInterface $builder, array $options) {
		/** @var \Symfony\Component\Translation\Translator $trans */
		$trans = $options['translator'];

		$builder
			->add('socialreason', TextType::class , array(
				'label'        => $trans->trans('cform.input.socialreason').'*',
				'attr'         => array(
					'placeholder' => $trans->trans('cform.input.socialreason'),
				),
				'constraints'                 => array(
					new NotBlank(array("message" => $trans->trans('bform.msg.error'))),
				)
			))
		->add('contactname', TextType::class , array(
				'label'        => $trans->trans('cform.input.contactname').'*',
				'attr'         => array(
					'placeholder' => $trans->trans('cform.input.contactname'),
				),
				'constraints'                 => array(
					new NotBlank(array("message" => $trans->trans('bform.msg.error'))),
				)
			))
		->add('email', EmailType::class , array(
				'label'        => $trans->trans('cform.input.email').'*',
				'attr'         => array(
					'placeholder' => $trans->trans('cform.input.email'),
				),
				'constraints'                 => array(
					new NotBlank(array("message" => $trans->trans('bform.msg.error'))),
					new Email(array("message"    => $trans->trans('bform.mail.error'))),
				),
			))
		->add('role', TextType::class , array(
				'label'        => $trans->trans('cform.input.role').'*',
				'attr'         => array(
					'placeholder' => $trans->trans('cform.input.role'),
				),
				'constraints'                 => array(
					new NotBlank(array("message" => $trans->trans('bform.msg.error'))),
				),
			))
		->add('countryoffice', CountryType::class , array(
				'label'        => $trans->trans('cform.input.countryoffice').'*',
				'attr'         => array(
					'placeholder' => $trans->trans('cform.input.countryoffice'),
				),
				'constraints'                 => array(
					new NotBlank(array("message" => $trans->trans('bform.msg.error'))),
				),
			))
		->add('phone', TextType::class , array(
				'label'        => $trans->trans('cform.input.phone'),
				'attr'         => array(
					'placeholder' => $trans->trans('cform.input.phone'),
				),
				'required' => false,
			))
			->add('activity', TextType::class , array(
				'label'        => $trans->trans('cform.input.activity').'*',
				'attr'         => array(
					'placeholder' => $trans->trans('cform.input.activity'),
				),
				'constraints'                 => array(
					new NotBlank(array("message" => $trans->trans('bform.msg.error'))),
				),
			))
		->add('turnover', ChoiceType::class , array(
				'label'                              => $trans->trans('cform.input.turnover'),
				'choices'                            => array(
					$trans->trans('bform.select.choice')=> '',
					$trans->trans('cform.title1')       => $trans->trans('cform.title1'),
					$trans->trans('cform.title2')       => $trans->trans('cform.title2'),
					$trans->trans('cform.title3')       => $trans->trans('cform.title3'),
					$trans->trans('cform.title4')       => $trans->trans('cform.title4'),
					$trans->trans('cform.title5')       => $trans->trans('cform.title5'),
				),
				'attr'         => array(
					'placeholder' => $trans->trans('cform.input.turnover'),
				),
				/*'constraints' => array(
				new NotBlank(array("message" => $trans->trans('bform.msg.error'))),
				),*/
				'required' => false,
			))
			->add('employees', TextType::class , array(
				'label'        => $trans->trans('cform.input.employees'),
				'attr'         => array(
					'placeholder' => $trans->trans('cform.input.employees'),
				),
				'required' => false,
			))
			->add('legalhotline', ChoiceType::class , array(
				'label'                              => $trans->trans('cform.input.legalhotline').'*',
				'choices'                            => array(
					$trans->trans('bform.select.choice')=> '',
					$trans->trans('bform.answer.yes')   => $trans->trans('bform.answer.yes'),
					$trans->trans('bform.answer.no')    => $trans->trans('bform.answer.no'),
				),
				'constraints'                 => array(
					new NotBlank(array("message" => $trans->trans('bform.msg.error'))),
				),
			))
		->add('legaladvice', ChoiceType::class , array(
				'label'                              => $trans->trans('cform.input.legaladvice').'*',
				'choices'                            => array(
					$trans->trans('bform.select.choice')=> '',
					$trans->trans('bform.answer.yes')   => $trans->trans('bform.answer.yes'),
					$trans->trans('bform.answer.no')    => $trans->trans('bform.answer.no'),
				),
				'constraints'                 => array(
					new NotBlank(array("message" => $trans->trans('bform.msg.error'))),
				),
			))
		->add('website', TextType::class , array(
				'label'        => $trans->trans('cform.input.website'),
				'attr'         => array(
					'placeholder' => $trans->trans('cform.input.website'),
				),
				'required' => false,
			))
			->add('question', TextareaType::class , array(
				'label'        => $trans->trans('bform.input.question12').'*',
				'attr'         => array(
					'placeholder' => $trans->trans('bform.placeholder.question12'),
					'rows'        => 3,
					'cols'        => 500,
					'maxlength'   => 250,
				),
				'constraints'                 => array(
					new NotBlank(array("message" => $trans->trans('bform.msg.error'))),
					new Length(array("min"       => 3, "max"       => 250, "maxMessage"       => $trans->trans('form.msg.error7'))),
				),
			));
	}

	/**
	 * {@inheritdoc}
	 */
	public function configureOptions(OptionsResolver $resolver) {
		$resolver->setRequired('translator');
		$resolver->setDefaults(array(
				'data_class' => 'EK\OjaadBundle\Entity\Company',
			));
	}

	/**
	 * @param OptionsResolver $resolver
	 */
	public function setDefaultOptions(OptionsResolver $resolver) {
		$resolver->setDefaults(array(
				'error_bubbling' => true
			));
	}

	/**
	 * {@inheritdoc}
	 */
	public function getBlockPrefix() {
		return 'ek_ojaadbundle_company';
	}

	/**
	 * @return string
	 */
	public function getName() {
		return 'company_form';
	}
}
